<?php

namespace App\Services;

use App\Model\ContasCadastradas;
use App\Core\Database;

class UserService
{
    public function cadastrar(string $nome, string $email, string $senha, string $perfil = 'Cliente'): array
    {
        $erros = [];

        $entityManager = Database::getEntityManager();

        $existing = $entityManager->getRepository(ContasCadastradas::class)
            ->findOneBy(['email' => $email]);

        if ($existing) {
            $erros[] = "E-mail já existente.";
            return $erros;
        }

        $conta = new ContasCadastradas();
        $conta->setNome($nome);
        $conta->setEmail($email);
        $conta->setSenha(password_hash($senha, PASSWORD_DEFAULT));
        $conta->setPerfil('Cliente');
        $conta->setDataCadastro(new \DateTime());

        $entityManager->persist($conta);
        $entityManager->flush();

        return $erros;
    }

    public function login(string $email, string $senha): ?ContasCadastradas
    {
        $entityManager = Database::getEntityManager();
        $conta = $entityManager->getRepository(ContasCadastradas::class)
            ->findOneBy(['email' => $email]);

        if ($conta && password_verify($senha, $conta->getSenha())) {
            return $conta;
        }

        return null;
    }
}
