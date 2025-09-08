<?php
require_once __DIR__ . '/../config/sessao.php';
require_once __DIR__ . '/../vendor/autoload.php';

<<<<<<< HEAD
=======

>>>>>>> 891fed5aa0f9e48a01e0f83338c5b394da45d7c3
$pdo = new PDO("mysql:host=localhost;dbname=dados-medeirosmoveis;charset=utf8", "root", "dados-medeirosMoveis");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->prepare("SELECT name FROM contasCadastradas WHERE id = ?");
$stmt->execute([$_SESSION['usuario_id']]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

$nomeUsuario = $usuario ? $usuario['name'] : "Usuário";
?>

<link rel="stylesheet" href="css/nav-footer.css">
<link rel="stylesheet" href="css/bemvindo.css">

<div class=bemvindo-container>
    <div class="bemvindo-box">

        <h2 class="nome-bemVindo">Olá, <strong class="nome-usuario"><?= htmlspecialchars($nomeUsuario) ?></strong></h2>

        <div class="div-bemvindo">

            <p class="msg-bemvindo">
                Que bom que você está conosco novamente. Estamos felizes em ter você conosco!
            </p>

            <div class="btn-container">
                <a href="home" class="btn btn-primary">Voltar ao Início</a>
                <a href="produto?categoria=moveis" class="btn btn-secondary">Ver Produtos</a>
            </div>

        </div>
    </div>
</div>