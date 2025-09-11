<?php

namespace App\Model;

use App\Model\ContasCadastradas;
use App\Model\verificaUsuario;

class VerificaUsuario
{
    public static function usuarioLogado()
    {
        if (!isset($_SESSION['usuario_id'])) return null;
        return ContasCadastradas::findById($_SESSION['usuario_id']);
    }

    public static function alterarSenha($usuario, $senhaAtual, $novaSenha, $confirmaNova)
    {
        if ($novaSenha !== $confirmaNova) return "As senhas não conferem.";
        if (!ContasCadastradas::senhaValida($novaSenha)) return "A nova senha deve ter 8-16 caracteres, com maiúscula, minúscula, número e símbolo.";
        if (!$usuario->alterarSenha($senhaAtual, $novaSenha)) return "Senha atual incorreta.";
        return "";
    }
}
