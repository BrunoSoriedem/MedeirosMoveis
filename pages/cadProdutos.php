<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/sessao.php';

use App\Controller\CadProdutosController;

$mensagem = '';
$controller = new CadProdutosController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensagem = $controller->cadastrar();
}
?>

<link rel="stylesheet" href="css/nav-footer.css">
<link rel="stylesheet" href="css/cadprod.css">

<h2 style="text-align:center;">Cadastro de Produtos</h2>

<?php if (!empty($mensagem)): ?>
<p style="color: green; text-align: center;"><?= htmlspecialchars($mensagem) ?></p>
<?php endif; ?>

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