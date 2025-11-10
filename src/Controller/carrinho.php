<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controller\CarrinhoController;

header('Content-Type: application/json; charset=utf-8');

session_start();

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(['erro' => 'Você precisa estar logado para adicionar produtos ao carrinho.']);
    exit;
}

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'adicionar':
        CarrinhoController::adicionar();
        break;

    case 'remover':
        CarrinhoController::remover();
        break;

    case 'listar':
        CarrinhoController::listar();
        break;

    default:
        http_response_code(400);
        echo json_encode(['erro' => 'Ação inválida']);
        break;
}
