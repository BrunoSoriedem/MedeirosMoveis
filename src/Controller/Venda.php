<?php
require_once __DIR__ . '/../../config/sessao.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controller\VendaController;

header('Content-Type: application/json; charset=utf-8');

if (isset($_GET['action']) && $_GET['action'] === 'finalizar') {
    VendaController::finalizar();
}
