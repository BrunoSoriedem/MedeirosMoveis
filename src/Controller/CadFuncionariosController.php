<?php

namespace App\Controller;

use App\Model\Funcionarios;

class CadFuncionariosController
{
    public function cadastrar(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $funcao = $_POST['funcao'] ?? '';
            $diretorio_imagem = $_POST['diretorio_imagem'] ?? '';

            $funcionario = new Funcionarios(
                $name,
                $funcao,
                $diretorio_imagem
            );

            $funcionario->save();

            return "✅ Funcionário cadastrado com sucesso!";
        }

        return '';
    }
}
