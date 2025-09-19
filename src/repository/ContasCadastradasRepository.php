<?php

namespace App\Repository;

use App\Core\Database;
use App\Model\ContasCadastradas;
use Doctrine\ORM\EntityRepository;

class ContasCadastradasRepository extends EntityRepository
{
    public function save(ContasCadastradas $conta): void
    {
        $em = Database::getEntityManager();
        $em->persist($conta);
        $em->flush();
    }

    public function findByEmail(string $email): ?ContasCadastradas
    {
        return $this->findOneBy(['email' => strtolower($email)]);
    }

    public function verificarSenha(string $email, string $senhaInformada): false|ContasCadastradas
    {
        $usuario = $this->findByEmail($email);
        if (!$usuario) {
            return false;
        }
        return password_verify($senhaInformada, $usuario->getSenha()) ? $usuario : false;
    }

    public function listarTodos(): array
    {
        return $this->findAll();
    }
}
