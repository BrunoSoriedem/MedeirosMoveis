<?php
require_once __DIR__ . '/../config/sessao.php';
require_once __DIR__ . '/../vendor/autoload.php';

function senhaValida($senha)
{
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/', $senha);
}

$logado = isset($_SESSION['usuario_id']);

if ($logado) {
    try {
        $pdo = new PDO(
            "mysql:host=localhost;dbname=dados-medeirosmoveis;charset=utf8",
            "root",
            "dados-medeirosMoveis",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );

        $stmt = $pdo->prepare("SELECT id, name, email, perfil_acesso, senha FROM contasCadastradas WHERE id = ?");
        $stmt->execute([$_SESSION['usuario_id']]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) $logado = false;
        else {
            $nomeUsuario   = htmlspecialchars($usuario['name']);
            $emailUsuario  = htmlspecialchars($usuario['email']);
            $perfilUsuario = htmlspecialchars($usuario['perfil_acesso']);
            $iniciais      = strtoupper(substr($nomeUsuario, 0, 1));
        }
    } catch (PDOException $e) {
        die("Erro: " . $e->getMessage());
    }
}

$msgSenha = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['alterar_senha'])) {
    $email        = trim($_POST['email'] ?? '');
    $senhaAtual   = $_POST['senha_atual'] ?? '';
    $novaSenha    = $_POST['nova_senha'] ?? '';
    $confirmaNova = $_POST['confirmar_senha'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msgSenha = "Email inválido.";
    } elseif ($novaSenha !== $confirmaNova) {
        $msgSenha = "As senhas não conferem.";
    } elseif (!senhaValida($novaSenha)) {
        $msgSenha = "A nova senha deve ter 8-16 caracteres, pelo menos 1 letra maiúscula, 1 minúscula, 1 número e 1 caractere especial.";
    } else {
        $stmt = $pdo->prepare("SELECT id, senha FROM contasCadastradas WHERE email = ?");
        $stmt->execute([$email]);
        $usuarioCheck = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuarioCheck) {
            $msgSenha = "Usuário não encontrado.";
        } elseif (!password_verify($senhaAtual, $usuarioCheck['senha'])) {
            $msgSenha = "Senha atual incorreta.";
        } else {
            $hash = password_hash($novaSenha, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE contasCadastradas SET senha = ? WHERE id = ?");
            $stmt->execute([$hash, $usuarioCheck['id']]);
            $msgSenha = "Senha alterada com sucesso!";

            echo "<script>
                setTimeout(function(){
                    window.location.href = 'areaUsuario.php';
                }, 2000);
            </script>";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['loginEmail'] ?? '';
    $senha = $_POST['loginPassword'] ?? '';

    try {
        $pdo = new PDO("mysql:host=10.10.1.84;dbname=dados-medeirosmoveis;charset=utf8", "root", "dados-medeirosMoveis");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT id, name, email, senha FROM contasCadastradas WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id']   = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['name'];
            echo "<script>window.location.href='bemvindoEntrar';</script>";
            exit;
        } else {
            $_SESSION['erro_login'] = "E-mail ou senha inválidos.";
        }
    } catch (PDOException $e) {
        $_SESSION['erro_login'] = "Erro no banco: " . $e->getMessage();
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
                        <label for="email">Endereço de E-mail</label>
                        <div class="input-wrapper">
                            <input type="email" name="email" id="email" class="form-control" placeholder="exemplo@email.com"
                                required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                        </div>
                    </div>

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