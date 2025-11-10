<?php

namespace App\Repository;

use App\Model\ItensCarrinho;
use Doctrine\ORM\EntityRepository;

class ItensCarrinhoRepository extends EntityRepository
{
    public function findByConta(int $contaId): array
    {
        return $this->createQueryBuilder('i')
            ->where('i.conta = :conta')
            ->setParameter('conta', $contaId)
            ->orderBy('i.data_adicionado', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findItemByContaEProduto(int $contaId, int $produtoId): ?ItensCarrinho
    {
        $qb = $this->createQueryBuilder('i')
            ->where('i.conta = :conta')
            ->andWhere('i.produto = :produto')
            ->setParameter('conta', $contaId)
            ->setParameter('produto', $produtoId)
            ->getQuery();

        return $qb->getOneOrNullResult();
    }

    public function clearCarrinho(int $contaId): void
    {
        $this->createQueryBuilder('i')
            ->delete()
            ->where('i.conta = :conta')
            ->setParameter('conta', $contaId)
            ->getQuery()
            ->execute();
    }

    public function getTotalCarrinho(int $contaId): float
    {
        $result = $this->createQueryBuilder('i')
            ->select('SUM(i.preco_unitario * i.quantidade) as total')
            ->where('i.conta = :conta')
            ->setParameter('conta', $contaId)
            ->getQuery()
            ->getSingleScalarResult();

        return (float) $result;
    }
}
