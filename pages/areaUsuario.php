<?php
require_once __DIR__ . '/../vendor/autoload.php';

if (!isset($_SESSION['usuario_id'])) {
    $logado = false;
} else {
    $logado = true;
}

if ($logado) {
    try {
        $pdo = new PDO(
            "mysql:host=localhost;dbname=dados-medeirosmoveis;charset=utf8",
            "root",
            "dados-medeirosMoveis",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );

        $stmt = $pdo->prepare("SELECT name, email, perfil_acesso FROM contasCadastradas WHERE id = ?");
        $stmt->execute([$_SESSION['usuario_id']]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            $logado = false;
        } else {
            $nomeUsuario   = htmlspecialchars($usuario['name']);
            $emailUsuario  = htmlspecialchars($usuario['email']);
            $perfilUsuario = htmlspecialchars($usuario['perfil_acesso']);
            $iniciais = strtoupper(substr($nomeUsuario, 0, 1));
        }
    } catch (PDOException $e) {
        die("Erro: " . $e->getMessage());
    }
}
?>

<link rel="stylesheet" href="css/nav-footer.css">
<link rel="stylesheet" href="css/areaUsuario.css">

<div class="cliente-container">
    <div class="cliente-box">

        <?php if (!$logado): ?>
            <div class="aviso">Você precisa estar logado para acessar a área do cliente.</div>
            <div class="btn-container">
                <a href="entrar" class="btn-entrar">Entrar</a>
                <a href="cadastrar" class="btn-cadastrar">Cadastrar</a>
            </div>
        <?php else: ?>
            <div class="avatar"><?= $iniciais ?></div>
            <h2>Bem-vindo!</h2>
            <p class="subtitulo">Área do Cliente</p>

            <div class="info-card">
                <p><strong>Nome:</strong> <?= $nomeUsuario ?></p>
                <p><strong>Perfil de Acesso:</strong> <span class="perfil-tag"><?= $perfilUsuario ?></span></p>
                <p><strong>Email:</strong> <?= $emailUsuario ?></p>
            </div>

            <div class="alterar-senha">
                <button onclick="document.querySelector('.alterar-senha-form').style.display='block'">
                    🔒 Alterar Senha
                </button>

                <form class="alterar-senha-form" method="POST" action="alterar_senha.php">
                    <input type="email" name="email" placeholder="Digite seu email" required>
                    <input type="password" name="senha_atual" placeholder="Senha atual" required>
                    <input type="password" name="nova_senha" placeholder="Nova senha" required>
                    <input type="password" name="confirmar_senha" placeholder="Confirmar nova senha" required>
                    <button type="submit">Salvar Nova Senha</button>
                </form>
            </div>
        <?php endif; ?>

    </div>
</div>