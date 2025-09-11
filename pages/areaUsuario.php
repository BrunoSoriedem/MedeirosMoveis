<?php
require_once __DIR__ . '/../config/sessao.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\Model\ContasCadastradas;
use App\Model\verificaUsuario;

$usuario = VerificaUsuario::usuarioLogado();
$logado = $usuario !== null;

if ($logado) {
    $nomeUsuario   = htmlspecialchars($usuario->getName());
    $emailUsuario  = htmlspecialchars($usuario->getEmail());
    $perfilUsuario = htmlspecialchars($usuario->getPerfil());
    $iniciais      = strtoupper(substr($nomeUsuario, 0, 1));
}

$msgSenha = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['alterar_senha']) && $logado) {
    $msgSenha = VerificaUsuario::alterarSenha(
        $usuario,
        $_POST['senha_atual'],
        $_POST['nova_senha'],
        $_POST['confirmar_senha']
    );

    if ($msgSenha === '') {
        $_SESSION['msg_sucesso'] = "Senha alterada com sucesso!";
        echo "<script>window.location.href='bemvindoEntrar';</script>";
        exit;
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
                <a href="entrar" class="btn">Entrar</a>
                <a href="cadastrar" class="btn" id="cadastrar-btn">Cadastrar</a>
            </div>
        <?php else: ?>
            <div class="avatar"><?= $iniciais ?></div>
            <h2>Bem-vindo, <?= $nomeUsuario ?>!</h2>
            <p class="subtitulo">Área do Cliente</p>

            <div class="info-card">
                <p><strong>Nome:</strong> <?= $nomeUsuario ?></p>
                <p><strong>Perfil de Acesso:</strong> <span class="perfil-tag"><?= $perfilUsuario ?></span></p>
                <p><strong>Email:</strong> <?= $emailUsuario ?></p>
            </div>

            <div class="alterar-senha">
                <div class="btn-container">
                    <a class="btn-trocasenha" id="trocasenha-btn">Alterar Senha</a>
                    <a class="btn-sairConta">Sair da Conta</a>
                </div>

                <form id="formSenha" class="alterar-senha-form login-form" method="POST" action=""
                    style="display: <?= !empty($msgSenha) ? 'block' : 'none' ?>;">

                    <div class="form-group">
                        <label for="senhaAtual">Senha atual</label>
                        <div class="input-wrapper">
                            <input type="password" name="senha_atual" id="senhaAtual" class="form-control"
                                placeholder="Digite sua senha atual" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('senhaAtual', this)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="novaSenha">Nova senha (8-16 caracteres)</label>
                        <div class="input-wrapper">
                            <input type="password" name="nova_senha" id="novaSenha" class="form-control"
                                placeholder="Digite sua nova senha" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('novaSenha', this)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirmarSenha">Confirmar sua senha</label>
                        <div class="input-wrapper">
                            <input type="password" name="confirmar_senha" id="confirmarSenha" class="form-control"
                                placeholder="Confirme sua nova senha" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('confirmarSenha', this)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="login-button" name="alterar_senha">Salvar Nova Senha</button>
                </form>

                <?php if (!empty($msgSenha)): ?>
                    <div class="msg-senha"><?= $msgSenha ?></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
</div>

<script>
    document.getElementById("trocasenha-btn").addEventListener("click", function() {
        const form = document.getElementById("formSenha");
        form.style.display = (form.style.display === "none" || form.style.display === "") ? "block" : "none";
    });
</script>

<script>
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);
        if (input.type === "password") {
            input.type = "text";
            button.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            input.type = "password";
            button.innerHTML = '<i class="fas fa-eye"></i>';
        }
    }
</script>

<script>
    document.querySelector(".btn-sairConta").addEventListener("click", function(e) {
        e.preventDefault();
        if (confirm("Tem certeza que deseja sair da conta?")) {
            window.location.href = "logout";
        }
    });
</script>