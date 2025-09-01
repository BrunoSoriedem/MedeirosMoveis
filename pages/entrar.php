<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['loginEmail'] ?? '';
    $senha = $_POST['loginPassword'] ?? '';

    try {
        $pdo = new PDO("mysql:host=10.10.8.82;dbname=dados-medeirosmoveis;charset=utf8", "root", "dados-medeirosMoveis");
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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/nav-footer.css">
<link rel="stylesheet" href="css/entrar.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<section id="section-email" data-aos="fade-up">
    <div class="contact-container">
        <div class="login-container">
            <div class="login-header">
                <h2 class="login-title">Já tenho uma conta Medeiros Móveis</h2>
                <p class="login-subtitle">Acesse sua conta para acompanhar as novidades, ofertas exclusivas e muito
                    mais</p>
            </div>

            <div class="login-form">
                <?php if (isset($_SESSION['erro_login'])): ?>
                <div class="alert alert-danger">
                    <?php
                        echo $_SESSION['erro_login'];
                        unset($_SESSION['erro_login']);
                        ?>
                </div>
                <?php endif; ?>

                <form method="post" action="">
                    <div class="form-group">
                        <label for="loginEmail">Endereço de E-mail</label>
                        <div class="input-wrapper">
                            <input type="email" name="loginEmail" id="loginEmail" class="form-control" required
                                placeholder="exemplo@email.com">
                            <div class="input-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="loginPassword">Senha</label>
                        <div class="input-wrapper">
                            <input type="password" name="loginPassword" id="loginPassword" class="form-control" required
                                placeholder="Digite sua senha">
                            <button type="button" class="password-toggle"
                                onclick="togglePassword('loginPassword', this)" title="Mostrar/Ocultar senha">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="login-button" id="loginBtn">
                        Entrar na minha conta
                    </button>
                </form>
            </div>

            <div class="register-link">
                <div class="divider">
                    <span>Ainda não tem conta?</span>
                </div>
                <p class="p-registerLink">Crie sua conta e tenha acesso a todos os recursos exclusivos</p>
                <a class="register-button" href="cadastrar">
                    <i class="fas fa-user-plus" style="margin-right: 8px;"></i>
                    Criar Nova Conta
                </a>
            </div>
        </div>
    </div>
</section>

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
</body>

</html>