<?php

use App\Model\ContasCadastradas;
use App\Model\User;

require_once __DIR__ . '/../vendor/autoload.php';

class PasswordValidator
{
    private string $password;
    private array $errors = [];

    public function __construct(string $password)
    {
        $this->password = $password;
    }

    public function validate(): bool
    {
        if (strlen($this->password) < 8 || strlen($this->password) > 16) {
            $this->errors[] = "A senha deve ter entre 8 e 16 caracteres.";
        }
        if (!preg_match('/[A-Z]/', $this->password)) {
            $this->errors[] = "A senha deve conter ao menos uma letra maiúscula.";
        }
        if (!preg_match('/[a-z]/', $this->password)) {
            $this->errors[] = "A senha deve conter ao menos uma letra minúscula.";
        }
        if (!preg_match('/[0-9]/', $this->password)) {
            $this->errors[] = "A senha deve conter ao menos um número.";
        }
        if (!preg_match('/[\W_]/', $this->password)) {
            $this->errors[] = "A senha deve conter ao menos um caractere especial.";
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}

$erros = [];
$sucesso = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome         = $_POST['nomePessoa'] ?? '';
    $email        = $_POST['loginEmail'] ?? '';
    $senha        = $_POST['loginPassword'] ?? '';
    $confirmSenha = $_POST['confirmPassword'] ?? '';

    $validator = new PasswordValidator($senha);

    if ($validator->validate()) {
        if ($senha === $confirmSenha) {
            $em = \App\Core\Database::getEntityManager();
            $repo = $em->getRepository(ContasCadastradas::class);
            $usuarioExistente = $repo->findOneBy(['email' => $email]);

            if ($usuarioExistente) {
                $erros[] = "E-mail já existente, caso seja você mesmo, tente acessar sua conta.";
            } else {
                $data_cadastro = new \DateTime();

                $contasCadastradas = new ContasCadastradas(
                    $nome,
                    $email,
                    password_hash($senha, PASSWORD_DEFAULT),
                    $data_cadastro
                );
                $contasCadastradas->save();

                echo "<script>window.location.href='entrar';</script>";
            }
        } else {
            $erros[] = "A confirmação da senha não confere.";
        }
    } else {
        $erros = $validator->getErrors();
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