<?php

use App\Model\Funcionarios;
use App\Model\Database;

require_once __DIR__ . "/../vendor/autoload.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $funcao = $_POST['funcao'] ?? '';
    $diretorio_imagem = $_POST['diretorio_imagem'] ?? '';

    $funcionario = new Funcionarios(
        $name,
        $funcao,
        $diretorio_imagem
    );

    $funcionario->save();

    echo "<p style='color:green; text-align: center; padding-top: 20px;'>✅ Funcionário cadastrado com sucesso!</p>";
}

?>




<link rel="stylesheet" href="css/nav-footer.css">
<link rel="stylesheet" href="css/cadfunc.css">


<div class="container-cadFunc">
    <h2>Cadastro de Funcionários</h2>
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