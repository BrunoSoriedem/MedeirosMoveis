<?php

namespace App\Controller;

use App\Core\Database;
use App\Model\Produtos;

class HomeController
{
    public function index(): void
    {
        $em = Database::getEntityManager();
        $repository = $em->getRepository(Produtos::class);
        $produtos = $repository->findAll();

        $categorias = [
            'moveis' => [],
            'planejados' => [],
            'estofados' => [],
            'eletros' => []
        ];
        $novidades = [];
        $maisVendidos = [];

        foreach ($produtos as $p) {
            if (strtolower($p->getMoveis()) === 'sim') {
                $categorias['moveis'][] = $p;
            }
            if (strtolower($p->getPlanejados()) === 'sim') {
                $categorias['planejados'][] = $p;
            }
            if (strtolower($p->getEstofados()) === 'sim') {
                $categorias['estofados'][] = $p;
            }
            if (strtolower($p->getEletros()) === 'sim') {
                $categorias['eletros'][] = $p;
            }
            if (strtolower($p->getNovidade()) === 'sim') {
                $novidades[] = $p;
            }
            if (strtolower($p->getMaisVendido()) === 'sim') {
                $maisVendidos[] = $p;
            }
        }

        require __DIR__ . '/../../pages/home.php';
    }
}
