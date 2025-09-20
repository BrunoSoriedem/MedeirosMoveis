<?php
require_once __DIR__ . '/../config/sessao.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\Model\ContasCadastradas;
use App\Model\VerificaUsuario;

$usuario = VerificaUsuario::usuarioLogado();
$logado = $usuario !== null;

if (!$logado) {
    echo "<script>window.location.href='bemvindoEntrar';</script>";
    exit;
}

$nomeUsuario = htmlspecialchars($usuario->getName());
?>

<link rel="stylesheet" href="css/nav-footer.css">
<link rel="stylesheet" href="css/bemvindo.css">

<div class=bemvindo-container>
    <div class="bemvindo-box">

        <h2 class="nome-bemVindo"> Olá, <strong class="nome-usuario"><?= $nomeUsuario ?></strong></h2>

        <div class="div-bemvindo">

            <p class="msg-bemvindo">
                Que bom que você está conosco. Estamos felizes em ter você como um cliente Medeiros Móveis!
            </p>

            <div class="btn-container">
                <a href="home" class="btn btn-primary">Voltar ao Início</a>
                <a href="produto?categoria=moveis" class="btn btn-secondary">Ver Produtos</a>
            </div>

        </div>
    </div>
</div>