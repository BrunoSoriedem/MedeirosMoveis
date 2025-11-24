<?php

namespace App\Controller;

use App\Model\Produtos;
use App\Model\ContasCadastradas;
use App\Model\ItensCarrinho;
use App\Core\Database;

class CarrinhoController
{
    private static function iniciarSessao()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    private static function jsonResponse(array $data)
    {
        if (ob_get_length()) {
            ob_clean();
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        exit;
    }

    public static function adicionar()
    {
        self::iniciarSessao();

        $idProduto = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $usuario = \App\Model\VerificaUsuario::usuarioLogado();
        $idConta = $usuario ? $usuario->getId() : null;

        if (!$idProduto || !$idConta) {
            self::jsonResponse([
                'sucesso' => false,
                'erro' => 'Usuário não logado ou produto inválido.'
            ]);
        }

        try {
            $em = Database::getEntityManager();

            $produto = $em->getRepository(Produtos::class)->find($idProduto);
            if (!$produto) {
                self::jsonResponse([
                    'sucesso' => false,
                    'erro' => 'Produto não encontrado.'
                ]);
            }

            $conta = $em->getRepository(ContasCadastradas::class)->find($idConta);
            if (!$conta) {
                self::jsonResponse([
                    'sucesso' => false,
                    'erro' => 'Conta não encontrada.'
                ]);
            }

            $item = $em->getRepository(ItensCarrinho::class)
                ->createQueryBuilder('i')
                ->where('i.conta = :conta AND i.produto = :produto')
                ->setParameter('conta', $conta)
                ->setParameter('produto', $produto)
                ->getQuery()
                ->getOneOrNullResult();

            if ($item) {
                $item->setQuantidade($item->getQuantidade() + 1);
            } else {
                $item = new ItensCarrinho();
                $item->setConta($conta);
                $item->setProduto($produto);
                $item->setPrecoUnitario($produto->getPrecoAV());
                $item->setQuantidade(1);
                $em->persist($item);
            }

            $em->flush();

            self::jsonResponse([
                'sucesso' => true,
                'mensagem' => 'Produto adicionado ao carrinho com sucesso!'
            ]);
        } catch (\Throwable $e) {
            self::jsonResponse([
                'sucesso' => false,
                'erro' => 'Erro interno: ' . $e->getMessage()
            ]);
        }
    }

    public static function remover()
    {
        self::iniciarSessao();

        $idProduto = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $usuario = \App\Model\VerificaUsuario::usuarioLogado();
        $idConta = $usuario ? $usuario->getId() : null;

        if (!$idProduto || !$idConta) {
            self::jsonResponse([
                'sucesso' => false,
                'erro' => 'Usuário não logado ou produto inválido.'
            ]);
        }

        try {
            $em = Database::getEntityManager();

            $item = $em->getRepository(ItensCarrinho::class)
                ->createQueryBuilder('i')
                ->where('i.conta = :conta AND i.produto = :produto')
                ->setParameter('conta', $idConta)
                ->setParameter('produto', $idProduto)
                ->getQuery()
                ->getOneOrNullResult();

            if (!$item) {
                self::jsonResponse([
                    'sucesso' => false,
                    'erro' => 'Item não encontrado no carrinho.'
                ]);
            }

            $novaQtd = $item->getQuantidade() - 1;

            if ($novaQtd <= 0) {
                $em->remove($item);
                $msg = 'Produto removido do carrinho!';
            } else {
                $item->setQuantidade($novaQtd);
                $em->persist($item);
                $msg = 'Quantidade reduzida com sucesso!';
            }

            $em->flush();

            self::jsonResponse([
                'sucesso' => true,
                'mensagem' => $msg
            ]);
        } catch (\Throwable $e) {
            self::jsonResponse([
                'sucesso' => false,
                'erro' => 'Erro interno: ' . $e->getMessage()
            ]);
        }
    }

    public static function listar()
    {
        self::iniciarSessao();

        $usuario = \App\Model\VerificaUsuario::usuarioLogado();
        $idConta = $usuario ? $usuario->getId() : null;

        if (!$idConta) {
            self::jsonResponse([]);
        }

        $em = Database::getEntityManager();
        $itens = $em->getRepository(ItensCarrinho::class)->findBy(['conta' => $idConta]);

        $retorno = array_map(function ($item) {
            return [
                'id' => $item->getProduto()->getId(),
                'nome' => $item->getProduto()->getDescricao(),
                'preco' => $item->getPrecoUnitario(),
                'quantidade' => $item->getQuantidade(),
                'imagem' => $item->getProduto()->getDiretorioImagem(),
            ];
        }, $itens);

        self::jsonResponse($retorno);
    }

    public static function listarRetorno(): array
    {
        self::iniciarSessao();

        $usuario = \App\Model\VerificaUsuario::usuarioLogado();
        $idConta = $usuario ? $usuario->getId() : null;

        if (!$idConta) return [];

        $em = Database::getEntityManager();
        $itens = $em->getRepository(ItensCarrinho::class)->findBy(['conta' => $idConta]);

        return array_map(function ($item) {
            return [
                'id' => $item->getProduto()->getId(),
                'nome' => $item->getProduto()->getDescricao(),
                'preco' => $item->getPrecoUnitario(),
                'quantidade' => $item->getQuantidade(),
                'imagem' => $item->getProduto()->getDiretorioImagem(),
            ];
        }, $itens);
    }
}
