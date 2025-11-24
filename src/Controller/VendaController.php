<?php

namespace App\Controller;

use App\Core\Database;
use App\Model\Venda;
use App\Model\ItensVenda;
use App\Model\ItensCarrinho;
use App\Model\VerificaUsuario;
use App\Repository\ProdutoRepository;

class VendaController
{
    public static function finalizar()
    {
        header('Content-Type: application/json; charset=utf-8');

        if (!VerificaUsuario::usuarioLogado()) {
            echo json_encode(['sucesso' => false, 'erro' => 'Usuário não autenticado.']);
            return;
        }

        if (!isset($_POST['produtos'])) {
            echo json_encode(['sucesso' => false, 'erro' => 'Nenhum produto recebido.']);
            return;
        }

        $produtosSelecionados = json_decode($_POST['produtos'], true);

        if (!$produtosSelecionados || !is_array($produtosSelecionados)) {
            echo json_encode(['sucesso' => false, 'erro' => 'Lista de produtos inválida.']);
            return;
        }

        $usuario = VerificaUsuario::usuarioLogado();

        try {
            $em = Database::getEntityManager();
            $conn = $em->getConnection();

            $conn->beginTransaction();

            $venda = new Venda();
            $venda->setConta($usuario);
            $em->persist($venda);

            $repoCarrinho = $em->getRepository(ItensCarrinho::class);
            $itensCarrinho = $repoCarrinho->findBy(['conta' => $usuario]);

            foreach ($itensCarrinho as $item) {

                $produto = $item->getProduto();
                $produtoId = $produto->getId();

                if (!in_array($produtoId, $produtosSelecionados)) {
                    continue;
                }

                $quantidade = $item->getQuantidade();
                $nomeProduto = $produto->getDescricao();

                // $produtoRepo = new ProdutoRepository($em);
                // $estoqueOk = $produtoRepo->verificarEstoque($produtoId, $quantidade);

                $produtoRepo = $em->getRepository(\App\Model\Produtos::class);
                $estoqueOk = $produtoRepo->verificarEstoque($produtoId, $quantidade);

                if (!$estoqueOk) {
                    $conn->rollBack();
                    echo json_encode([
                        'sucesso' => false,
                        'erro' => "O produto '{$nomeProduto}' não possui estoque suficiente."
                    ]);
                    return;
                }

                $produto->setQtdeDisp($produto->getQtdeDisp() - $quantidade);
                $em->persist($produto);

                $itemVenda = new ItensVenda();
                $itemVenda->setVenda($venda);
                $itemVenda->setProduto($produto);
                $itemVenda->setQuantidade($quantidade);
                $itemVenda->setPrecoUnitario($item->getPrecoUnitario());

                $venda->addItem($itemVenda);
                $em->persist($itemVenda);
            }

            $venda->setValorTotal($venda->getTotal());
            $em->flush();

            foreach ($produtosSelecionados as $idProd) {
                $repoCarrinho->deleteByProduto($usuario->getId(), $idProd);
            }

            $conn->commit();

            echo json_encode([
                'sucesso' => true,
                'mensagem' => 'Venda finalizada com sucesso!'
            ]);
        } catch (\Exception $e) {

            if ($conn->isTransactionActive()) {
                $conn->rollBack();
            }

            echo json_encode([
                'sucesso' => false,
                'erro' => 'Erro ao salvar venda: ' . $e->getMessage()
            ]);
        }
    }
}
