<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/sessao.php';

use App\Controller\CadFuncionariosController;

$mensagem = '';
$controller = new CadFuncionariosController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensagem = $controller->cadastrar();
}

?>

<link rel="stylesheet" href="css/nav-footer.css">
<link rel="stylesheet" href="css/cadfunc.css">

<div class="container-cadFunc">
    <h2>Cadastro de Funcionários</h2>

    <?php if (!empty($mensagem)): ?>
        <p style="color:green; text-align: center; padding-top: 20px;"><?= htmlspecialchars($mensagem) ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="name" required>

        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="funcao" required>

        <label>Imagem do Funcionário:</label>
        <input type="text" name="diretorio_imagem" placeholder="ex: /imagens/funcionario1.jpg">

        <div class="btn-container">
            <button type="submit" class="btn btn-primary">Cadastrar Funcionário</button>
        </div>
    </form>
</div>