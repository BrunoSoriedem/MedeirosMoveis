<?php

require_once __DIR__ . '/../config/sessao.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\services\UserService;
use App\core\Database;
use App\services\ValidarSenhaEspecifica;

$erros = [];
$sucesso = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nomePessoa'] ?? '';
    $email = $_POST['loginEmail'] ?? '';
    $senha = $_POST['loginPassword'] ?? '';
    $confirmSenha = $_POST['confirmPassword'] ?? '';

    $validator = new ValidarSenhaEspecifica($senha);

    if (!$validator->validate()) {
        $erros = $validator->getErrors();
    } elseif ($senha !== $confirmSenha) {
        $erros[] = "A confirmação da senha não confere.";
    } else {
        $usuarioService = new UserService();
        $erros = $usuarioService->cadastrar($nome, $email, $senha);

        if (empty($erros)) {
            $sucesso = "Cadastro realizado com sucesso! Redirecionando...";
            echo "<script>
                    setTimeout(() => { window.location.href='Entrar'; }, 2000);
                    </script>";
        }
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/nav-footer.css">
<link rel="stylesheet" href="css/cadastrar.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<section id="section-email" data-aos="fade-up">
    <div class="contact-container">
        <div class="login-container">
            <div class="login-header">
                <h2 class="login-title">Crie uma conta Medeiros Móveis</h2>
                <p class="login-subtitle">Crie sua conta Medeiros Móveis para acompanhar as novidades e promoções.</p>
            </div>

            <div class="login-form">
                <?php if (!empty($erros)): ?>
                    <div class="alert alert-danger" id="errorMessages">
                        <?php foreach ($erros as $erro): ?>
                            <p><?= htmlspecialchars($erro) ?></p>
                        <?php endforeach; ?>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const senhaInput = document.getElementById('loginPassword');
                            if (senhaInput) senhaInput.focus();
                        });
                    </script>
                <?php endif; ?>

                <?php if ($sucesso): ?>
                    <div class="alert alert-success">
                        <p><?= htmlspecialchars($sucesso) ?></p>
                    </div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="form-group">
                        <label for="nomePessoa">Nome</label>
                        <div class="input-wrapper">
                            <input type="text" name="nomePessoa" id="nomePessoa" class="form-control" required
                                placeholder="Nome" value="<?= htmlspecialchars($_POST['nomePessoa'] ?? '') ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="loginEmail">Endereço de E-mail</label>
                        <div class="input-wrapper">
                            <input type="email" name="loginEmail" id="loginEmail" class="form-control" required
                                placeholder="exemplo@email.com"
                                value="<?= htmlspecialchars($_POST['loginEmail'] ?? '') ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="loginPassword">Senha (8-16 caracteres)</label>
                        <div class="input-wrapper">
                            <input type="password" name="loginPassword" id="loginPassword" class="form-control" required
                                placeholder="Digite sua senha">
                            <button type="button" class="password-toggle"
                                onclick="togglePassword('loginPassword', this)" title="Mostrar/Ocultar senha">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">Confirme sua Senha</label>
                        <div class="input-wrapper">
                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control"
                                required placeholder="Confirme sua senha">
                            <button type="button" class="password-toggle"
                                onclick="togglePassword('confirmPassword', this)" title="Mostrar/Ocultar senha">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="login-button btn btn-primary w-100 mt-3" id="CadBtn">
                        Criar conta
                    </button>
                </form>
            </div>

            <div class="register-link mt-3">
                <div class="divider">
                    <span>Já tem uma conta?</span>
                </div>
                <p>Acesse sua conta aqui, e fique por dentro de nossas promoções</p>
                <a class="register-button btn btn-outline-secondary" href="entrar">
                    <i class="fas fa-user me-2"></i>
                    Acessar minha conta
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);
        const icon = button.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'fas fa-eye-slash';
            button.title = 'Ocultar senha';
        } else {
            input.type = 'password';
            icon.className = 'fas fa-eye';
            button.title = 'Mostrar senha';
        }
    }
</script>