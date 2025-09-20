<?php

namespace App\Controller;

use App\Core\Database;
use App\Model\Produtos;

class ProdutosController
{
    public function index(): void
    {
        $em = Database::getEntityManager();
        $repository = $em->getRepository(Produtos::class);
        $produtos = $repository->findAll();

        require __DIR__ . '/../../pages/produto.php';
    }
}
