<?php

namespace App\Controller;

use App\Model\VerificaUsuario;

class UsuarioController
{
    public function areaUsuario(): array
    {
        $usuario = VerificaUsuario::usuarioLogado();
        $logado = $usuario !== null;

        $dados = [
            'logado' => $logado,
            'msgSenha' => '',
            'nomeUsuario' => '',
            'emailUsuario' => '',
            'perfilUsuario' => '',
            'iniciais' => ''
        ];

        if ($logado) {
            $dados['nomeUsuario']   = htmlspecialchars($usuario->getName());
            $dados['emailUsuario']  = htmlspecialchars($usuario->getEmail());
            $dados['perfilUsuario'] = htmlspecialchars($usuario->getPerfil());
            $dados['iniciais']      = strtoupper(substr($dados['nomeUsuario'], 0, 1));
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['alterar_senha']) && $logado) {
            $dados['msgSenha'] = VerificaUsuario::alterarSenha(
                $usuario,
                $_POST['senha_atual'] ?? '',
                $_POST['nova_senha'] ?? '',
                $_POST['confirmar_senha'] ?? ''
            );

            if ($dados['msgSenha'] === '') {
                $dados['msgSucesso'] = "Senha alterada com sucesso!";
            }
        }

        return $dados;
    }
}
