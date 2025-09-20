<?php

namespace App\Controller;

use App\Model\Funcionarios;

class SobreNosController
{
    public function index(): void
    {
        $funcionarios = Funcionarios::findAll();
        require __DIR__ . '/../../pages/sobreNos.php';
    }
}
