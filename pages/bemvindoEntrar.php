<?php
require_once __DIR__ . '/../vendor/autoload.php';

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

<style>
    .container {
        text-align: center;
        padding: 2rem;
        max-width: 700px;
        animation: fadeIn 0.8s ease-out;
        margin-top: 80px;
        margin-bottom: 40px;
    }

    .bemvindo-container {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        max-width: 1200px;
        margin: 100px auto;
        padding: 60px 50px;

        background: linear-gradient(135deg, #ffffff 0%, #f8fffe 100%);

        border: 3px solid transparent;
        background-clip: padding-box;
        position: relative;

        box-shadow:
            0 20px 60px rgba(0, 0, 0, 0.15),
            0 8px 25px rgba(0, 0, 0, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        border-radius: 24px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .bemvindo-container::before {
        content: '';
        position: absolute;
        top: -3px;
        left: -3px;
        right: -3px;
        bottom: -3px;
        border-radius: 27px;
        z-index: -1;
    }

    .bemvindo-container:hover {
        transform: translateY(-8px);
        box-shadow:
            0 30px 80px rgba(13, 61, 34, 0.2),
            0 12px 35px rgba(0, 0, 0, 0.12),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
    }

    @media (max-width: 768px) {
        .bemvindo-container {
            margin: 50px 20px;
            padding: 40px 30px;
            gap: 30px;
        }
    }

    @media (max-width: 480px) {
        .bemvindo-container {
            margin: 30px 15px;
            padding: 30px 20px;
            gap: 20px;
        }
    }

    .nome-bemVindo {
        font-size: 2.7rem;
        color: #000;
        display: inline-block;
    }

    .nome-bemVindo::after {
        content: '';
        display: block;
        width: 50px;
        height: 4px;
        background-color: #2ecc71;
        margin: 15px auto;
    }

    .nome-usuario {
        color: #000000ff;
        font-size: 3rem;
    }

    .msg-bemvindo {
        font-size: 1.2rem;
        margin: 1rem 0 2rem;

    }

    .btn-container {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-block;
        padding: 12px 30px;
        background-color: #2ecc71;
        color: white;
        text-decoration: none;
        border-radius: 10px;
        font-weight: bold;
        transition: all 0.3s ease;
        border: 2px solid #2ecc71;
        position: relative;
        overflow: hidden;
    }

    .btn-primary:hover {
        background-color: #fff;
        color: #2ecc71;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        border: 2px solid #2ecc71;
    }

    .btn-secondary {
        background-color: transparent;
        color: #000;
        border: 2px solid #000;
    }

    .btn-secondary:hover {
        background-color: #000;
        color: white;
        transform: translateY(-5px);
    }

    .decoration {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        pointer-events: none;
        overflow: hidden;
    }

    @media (max-width: 768px) {
        .error-code {
            font-size: 4rem;
        }

        .error-message {
            font-size: 1.2rem;
        }

        .div-bemvindo {
            font-size: 0.9rem;
        }

        .btn {
            padding: 10px 25px;
            font-size: 0.9rem;
        }
    }
</style>
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