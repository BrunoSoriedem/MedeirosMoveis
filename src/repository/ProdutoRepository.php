<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ProdutoRepository extends EntityRepository
{
    public function verificarEstoque(int $produtoId, int $quantidade): bool
    {
        $conn = $this->getEntityManager()->getConnection();

        $id = (int) $produtoId;
        $qtd = (int) $quantidade;

        $sql = "SELECT VerificarEstoque($id, $qtd) AS ok";

        $result = $conn->executeQuery($sql)->fetchAssociative();

        return isset($result['ok']) && (int)$result['ok'] === 1;
    }
}
