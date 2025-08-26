<?php

use App\Model\Produtos;
use App\Model\Database;

require_once __DIR__ . "/../vendor/autoload.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'] ?? '';
    $precoAV = (float)($_POST['precoAV'] ?? 0);
    $precoAP = (float)($_POST['precoAP'] ?? 0);
    $moveis = $_POST['moveis'] ?? 'nao';
    $planejados = $_POST['planejados'] ?? 'nao';
    $estofados = $_POST['estofados'] ?? 'nao';
    $eletros = $_POST['eletros'] ?? 'nao';
    $maisVendido = $_POST['maisVendido'] ?? 'nao';
    $novidade = $_POST['novidade'] ?? 'nao';
    $diretorio_imagem = $_POST['diretorio_imagem'] ?? '';

    $data_cadastro = new DateTime();

    $produto = new Produtos(
        $descricao,
        $precoAV,
        $precoAP,
        $moveis,
        $planejados,
        $estofados,
        $eletros,
        $maisVendido,
        $novidade,
        $diretorio_imagem,
        $data_cadastro
    );

    $produto->save();

    echo "<p style='color:green;'>✅ Produto cadastrado com sucesso!</p>";
}
?>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Inter", Helvetica, sans-serif;
}

[data-aos] {
    z-index: 0;
}

html,
body {
    height: 100%;
    overflow-x: hidden;
    position: relative;
}

body {
    display: flex;
    flex-direction: column;
    padding-top: 50px;
    width: 150vw;
}

form {
    background: #fff;
    margin-top: 50%;
    padding: 20px;
    border-radius: 10px;
    max-width: 500px;
    margin: auto;
}

label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
}

input,
select {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button {
    margin-top: 15px;
    padding: 10px;
    width: 100%;
    background: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background: #45a049;
}
</style>

<link rel="stylesheet" href="css/nav-footer.css">
<h2 style="text-align:center;">Cadastro de Produtos</h2>

<form method="post">
    <label>Descrição:</label>
    <input type="text" name="descricao" required>

    <label>Preço à Vista:</label>
    <input type="number" step="0.01" name="precoAV" required>

    <label>Preço à Prazo:</label>
    <input type="number" step="0.01" name="precoAP" required>

    <label>Móveis:</label>
    <select name="moveis">
        <option value="sim">Sim</option>
        <option value="nao" selected>Não</option>
    </select>

    <label>Planejados:</label>
    <select name="planejados">
        <option value="sim">Sim</option>
        <option value="nao" selected>Não</option>
    </select>

    <label>Estofados:</label>
    <select name="estofados">
        <option value="sim">Sim</option>
        <option value="nao" selected>Não</option>
    </select>

    <label>Eletros:</label>
    <select name="eletros">
        <option value="sim">Sim</option>
        <option value="nao" selected>Não</option>
    </select>

    <label>Mais Vendido:</label>
    <select name="maisVendido">
        <option value="sim">Sim</option>
        <option value="nao" selected>Não</option>
    </select>

    <label>Novidade:</label>
    <select name="novidade">
        <option value="sim">Sim</option>
        <option value="nao" selected>Não</option>
    </select>

    <label>Diretório da Imagem:</label>
    <input type="text" name="diretorio_imagem" placeholder="ex: /imagens/produto1.jpg">

    <button type="submit">Cadastrar Produto</button>
</form>