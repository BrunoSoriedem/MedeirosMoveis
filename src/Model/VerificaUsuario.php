<?php

namespace App\Model;

use App\Core\Database;
use App\Model\ContasCadastradas;

class VerificaUsuario
{
    public static function usuarioLogado(): ?ContasCadastradas
    {
        if (!isset($_SESSION['usuario_id'])) {
            return null;
        }

        $em = Database::getEntityManager();
        $repo = $em->getRepository(ContasCadastradas::class);

        return $repo->find($_SESSION['usuario_id']) ?: null;
    }

    public static function alterarSenha($usuario, $senhaAtual, $novaSenha, $confirmaNova)
    {
        if ($novaSenha !== $confirmaNova) return "As senhas não conferem.";
        if (!ContasCadastradas::senhaValida($novaSenha)) {
            return "A nova senha deve ter 8-16 caracteres, com maiúscula, minúscula, número e símbolo.";
        }
        if (!$usuario->alterarSenha($senhaAtual, $novaSenha)) return "Senha atual incorreta.";
        return "";
    }
}
