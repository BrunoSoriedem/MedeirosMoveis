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

    /**
     * Verifica estoque e já decrementa a quantidade desejada no produto.
     * Retorna o objeto Produto atualizado (persistido no EM), ou dispara JSON de erro.
     *
     * @param \Doctrine\ORM\EntityManagerInterface $em
     * @param int $idProduto
     * @param int $quantidadeDesejada
     * @return Produtos
     */
    private static function verificarEAtualizarEstoque($em, int $idProduto, int $quantidadeDesejada = 1): Produtos
    {
        $produtoRepo = $em->getRepository(Produtos::class);
        $produto = $produtoRepo->find($idProduto);

        if (!$produto) {
            self::jsonResponse(['sucesso' => false, 'erro' => 'Produto não encontrado.']);
        }

        if ($produto->getQtdeDisp() < $quantidadeDesejada) {
            self::jsonResponse([
                'sucesso' => false,
                'erro' => 'Estoque insuficiente. Apenas ' . $produto->getQtdeDisp() . ' unidades disponíveis.'
            ]);
        }

        $produto->setQtdeDisp($produto->getQtdeDisp() - $quantidadeDesejada);
        $em->persist($produto);

        return $produto;
    }

    public static function adicionar()
    {
        self::iniciarSessao();

        $idProduto = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $usuario = \App\Model\VerificaUsuario::usuarioLogado();
        $idConta = $usuario ? $usuario->getId() : null;

        if (!$idProduto || !$idConta) {
            self::jsonResponse(['sucesso' => false, 'erro' => 'Usuário não logado ou produto inválido.']);
        }

        try {
            $em = Database::getEntityManager();

            $itensRepo = $em->getRepository(ItensCarrinho::class);
            $contaRepo = $em->getRepository(ContasCadastradas::class);

            $conta = $contaRepo->find($idConta);
            if (!$conta) {
                self::jsonResponse(['sucesso' => false, 'erro' => 'Conta não encontrada.']);
            }

            $produto = self::verificarEAtualizarEstoque($em, $idProduto, 1);

            $item = null;
            if (method_exists($itensRepo, 'findItemByContaEProduto')) {
                $item = $itensRepo->findItemByContaEProduto($idConta, $idProduto);
            } else {

                $item = $itensRepo->createQueryBuilder('i')
                    ->where('i.conta = :conta')
                    ->andWhere('i.produto = :produto')
                    ->setParameters(['conta' => $idConta, 'produto' => $idProduto])
                    ->getQuery()
                    ->getOneOrNullResult();
            }

            if ($item) {
                $item->setQuantidade($item->getQuantidade() + 1);
            } else {
                $item = new ItensCarrinho();
                $item->setConta($conta)
                    ->setProduto($produto)
                    ->setPrecoUnitario($produto->getPrecoAV())
                    ->setQuantidade(1);
                $em->persist($item);
            }

            $em->flush();

            self::jsonResponse([
                'sucesso' => true,
                'mensagem' => 'Produto adicionado ao carrinho!'
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

        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $usuario = \App\Model\VerificaUsuario::usuarioLogado();
        $idConta = $usuario ? $usuario->getId() : null;

        if (!$id || !$idConta) {
            self::jsonResponse(['sucesso' => false, 'erro' => 'Usuário não logado ou ID inválido.']);
        }

        try {
            $em = Database::getEntityManager();
            $itensRepo = $em->getRepository(ItensCarrinho::class);
            $item = null;

            if (method_exists($itensRepo, 'findItemByContaEProduto')) {
                $item = $itensRepo->findItemByContaEProduto($idConta, $id);
            } else {
                $item = $itensRepo->createQueryBuilder('i')
                    ->where('i.conta = :conta')
                    ->andWhere('i.produto = :produto')
                    ->setParameters(['conta' => $idConta, 'produto' => $id])
                    ->getQuery()
                    ->getOneOrNullResult();
            }

            if (!$item) {
                self::jsonResponse(['sucesso' => false, 'erro' => 'Item não encontrado.']);
            }

            $produto = $item->getProduto();

            $produto->setQtdeDisp($produto->getQtdeDisp() + $item->getQuantidade());
            $em->persist($produto);

            $em->remove($item);
            $em->flush();

            self::jsonResponse(['sucesso' => true, 'mensagem' => 'Item removido do carrinho!']);
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
        $itensRepo = $em->getRepository(ItensCarrinho::class);
        $itens = $itensRepo->findBy(['conta' => $idConta]);

        $dados = array_map(function ($item) {
            return [
                'id' => $item->getProduto()->getId(),
                'nome' => $item->getProduto()->getDescricao(),
                'preco' => $item->getPrecoUnitario(),
                'quantidade' => $item->getQuantidade(),
                'imagem' => $item->getProduto()->getDiretorioImagem(),
            ];
        }, $itens);

        self::jsonResponse($dados);
    }

    public static function getCarrinho(): array
    {
        self::iniciarSessao();
        return $_SESSION['carrinho'] ?? [];
    }

    public static function listarRetorno(): array
    {
        self::iniciarSessao();
        $usuario = \App\Model\VerificaUsuario::usuarioLogado();
        $idConta = $usuario ? $usuario->getId() : null;

        if (!$idConta) {
            return [];
        }

        $em = Database::getEntityManager();
        $itensRepo = $em->getRepository(ItensCarrinho::class);
        $itens = $itensRepo->findBy(['conta' => $idConta]);

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
