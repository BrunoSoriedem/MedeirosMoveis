<?php

namespace App\Repository;

use App\Core\Database;
use App\Model\EmailEnviados;

class EmailEnviadosRepository
{
    public function save(EmailEnviados $email): void
    {
        $em = Database::getEntityManager();
        $em->persist($email);
        $em->flush();
    }

    public function findAll(): array
    {
        $em = Database::getEntityManager();
        return $em->getRepository(EmailEnviados::class)->findAll();
    }
}
