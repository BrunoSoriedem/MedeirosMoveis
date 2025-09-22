<?php

namespace App\Controller;

use App\Model\Produtos;

class CadProdutosController
{
    public function cadastrar(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $descricao = $_POST['descricao'] ?? '';
            $precoAV = (float)($_POST['precoAV'] ?? 0);
            $precoAP = (float)($_POST['precoAP'] ?? 0);
            $moveis = $_POST['moveis'] ?? 'nao';
            $planejados = $_POST['planejados'] ?? 'nao';
            $estofados = $_POST['estofados'] ?? 'nao';
            $eletros = $_POST['eletros'] ?? 'nao';
            $maisVendido = $_POST['maisVendido'] ?? 'nao';
            $novidade = $_POST['novidade'] ?? 'nao';
            $diretorio_imagem = $_POST['diretorio_imagem'] ?? '';

            $data_cadastro = new \DateTime('now', new \DateTimeZone('America/Sao_Paulo'));

            $produto = new Produtos(
                $descricao,
                $precoAV,
                $precoAP,
                $moveis,
                $planejados,
                $estofados,
                $eletros,
                $maisVendido,
                $novidade,
                $diretorio_imagem,
                $data_cadastro
            );

            $produto->save();

            return "✅ Produto cadastrado com sucesso!";
        }

        return '';
    }
}