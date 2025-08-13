<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/nav-footer.css">
<link rel="stylesheet" href="css/contato.css">

<body>
    <div class="login-container">
        <div class="header">
            <div class="logo">🏡</div>
            <h1>LuxHome Design</h1>
            <p>Móveis de luxo para espaços únicos</p>
        </div>

        <div class="form-container">
            <div class="success-message" id="successMessage">
                ✅ Conta criada com sucesso! Faça login para acessar sua área exclusiva.
            </div>

            <div class="tab-buttons">
                <button class="tab-button active" onclick="switchTab('login')">Fazer Login</button>
                <button class="tab-button" onclick="switchTab('register')">Criar Conta</button>
            </div>

            <!-- Formulário de Login -->
            <div id="loginForm" class="form-section active">
                <form onsubmit="handleLogin(event)">
                    <div class="form-group">
                        <label for="loginEmail">Endereço de E-mail</label>
                        <div class="input-wrapper">
                            <input type="email" id="loginEmail" required placeholder="exemplo@email.com">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="loginPassword">Senha</label>
                        <div class="input-wrapper">
                            <input type="password" id="loginPassword" required placeholder="Digite sua senha">
                            <button type="button" class="password-toggle"
                                onclick="togglePassword('loginPassword', this)" title="Mostrar/Ocultar senha">
                                👁️
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="login-button" id="loginBtn">
                        Acessar Minha Conta
                    </button>
                </form>

                <div class="forgot-password">
                    <a href="#" onclick="handleForgotPassword()">Esqueci minha senha</a>
                </div>
            </div>

            <!-- Formulário de Cadastro -->
            <div id="registerForm" class="form-section">
                <form onsubmit="handleRegister(event)">
                    <div class="form-group">
                        <label for="registerName">Nome Completo</label>
                        <div class="input-wrapper">
                            <input type="text" id="registerName" required placeholder="Seu nome completo">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="registerEmail">Endereço de E-mail</label>
                        <div class="input-wrapper">
                            <input type="email" id="registerEmail" required placeholder="exemplo@email.com">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="registerPassword">Senha</label>
                        <div class="input-wrapper">
                            <input type="password" id="registerPassword" required placeholder="Mínimo 8 caracteres"
                                minlength="8">
                            <button type="button" class="password-toggle"
                                onclick="togglePassword('registerPassword', this)" title="Mostrar/Ocultar senha">
                                👁️
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">Confirmar Senha</label>
                        <div class="input-wrapper">
                            <input type="password" id="confirmPassword" required placeholder="Digite a senha novamente">
                            <button type="button" class="password-toggle"
                                onclick="togglePassword('confirmPassword', this)" title="Mostrar/Ocultar senha">
                                👁️
                            </button>
                        </div>
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="termsAccept" required>
                        <label for="termsAccept">Concordo com os <strong>Termos de Uso</strong> e <strong>Política de
                                Privacidade</strong> da LuxHome Design</label>
                    </div>

                    <button type="submit" class="login-button" id="registerBtn">
                        Criar Minha Conta
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>


<script>
    function switchTab(tab) {
        // Remover loading de todos os botões
        document.querySelectorAll('.login-button').forEach(btn => {
            btn.disabled = false;
            btn.innerHTML = btn.id === 'loginBtn' ? 'Acessar Minha Conta' : 'Criar Minha Conta';
        });

        // Remover classe active dos botões
        document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));

        // Remover classe active dos formulários
        document.querySelectorAll('.form-section').forEach(section => section.classList.remove('active'));

        // Adicionar classe active no botão clicado
        event.target.classList.add('active');

        // Mostrar formulário correspondente
        if (tab === 'login') {
            document.getElementById('loginForm').classList.add('active');
        } else {
            document.getElementById('registerForm').classList.add('active');
        }
    }

    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);

        if (input.type === 'password') {
            input.type = 'text';
            button.textContent = '🙈';
            button.title = 'Ocultar senha';
        } else {
            input.type = 'password';
            button.textContent = '👁️';
            button.title = 'Mostrar senha';
        }
    }

    function setButtonLoading(buttonId, isLoading) {
        const button = document.getElementById(buttonId);
        if (isLoading) {
            button.disabled = true;
            button.innerHTML = '<span class="loading"></span> Processando...';
        } else {
            button.disabled = false;
            button.innerHTML = buttonId === 'loginBtn' ? 'Acessar Minha Conta' : 'Criar Minha Conta';
        }
    }

    async function handleLogin(event) {
        event.preventDefault();
        const email = document.getElementById('loginEmail').value;
        const password = document.getElementById('loginPassword').value;

        setButtonLoading('loginBtn', true);

        // Simular delay de autenticação
        await new Promise(resolve => setTimeout(resolve, 1500));

        if (email && password) {
            // Simular sucesso
            document.querySelector('.login-container').style.transform = 'scale(0.95)';
            document.querySelector('.login-container').style.opacity = '0.8';

            setTimeout(() => {
                alert(`🎉 Bem-vindo(a) à LuxHome Design!\n\nRedirecionando para sua área exclusiva...`);
            }, 300);
        }

        setButtonLoading('loginBtn', false);
    }

    async function handleRegister(event) {
        event.preventDefault();
        const name = document.getElementById('registerName').value;
        const email = document.getElementById('registerEmail').value;
        const password = document.getElementById('registerPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        if (password !== confirmPassword) {
            alert('⚠️ As senhas não coincidem! Verifique e tente novamente.');
            return;
        }

        setButtonLoading('registerBtn', true);

        // Simular delay de cadastro
        await new Promise(resolve => setTimeout(resolve, 2000));

        if (name && email && password) {
            document.getElementById('successMessage').style.display = 'block';
            switchTabProgrammatically('login');
            document.getElementById('registerForm').reset();

            // Esconder mensagem após 8 segundos
            setTimeout(() => {
                document.getElementById('successMessage').style.display = 'none';
            }, 8000);
        }

        setButtonLoading('registerBtn', false);
    }

    function switchTabProgrammatically(tab) {
        document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
        document.querySelectorAll('.form-section').forEach(section => section.classList.remove('active'));

        if (tab === 'login') {
            document.querySelector('.tab-button').classList.add('active');
            document.getElementById('loginForm').classList.add('active');
        } else {
            document.querySelectorAll('.tab-button')[1].classList.add('active');
            document.getElementById('registerForm').classList.add('active');
        }
    }

    function handleForgotPassword() {
        const modal = document.createElement('div');
        modal.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 1000;
                animation: fadeIn 0.3s ease;
            `;

        modal.innerHTML = `
                <div style="background: white; padding: 32px; border-radius: 16px; max-width: 400px; text-align: center; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);">
                    <h3 style="margin-bottom: 16px; color: var(--text-primary);">Recuperar Senha</h3>
                    <p style="margin-bottom: 24px; color: var(--text-secondary); line-height: 1.5;">Em breve você receberá instruções detalhadas para redefinir sua senha no e-mail cadastrado.</p>
                    <button onclick="this.parentElement.parentElement.remove()" style="background: var(--primary-gold); color: white; border: none; padding: 12px 24px; border-radius: 8px; cursor: pointer; font-weight: 500;">Entendi</button>
                </div>
            `;

        document.body.appendChild(modal);
    }

    // Efeitos de micro-interação
    document.addEventListener('DOMContentLoaded', function() {
        // Efeito de hover nos inputs
        document.querySelectorAll('.input-wrapper').forEach(wrapper => {
            const input = wrapper.querySelector('input');

            wrapper.addEventListener('mouseenter', function() {
                if (!input.matches(':focus')) {
                    this.style.transform = 'translateY(-1px)';
                }
            });

            wrapper.addEventListener('mouseleave', function() {
                if (!input.matches(':focus')) {
                    this.style.transform = 'translateY(0)';
                }
            });

            input.addEventListener('focus', function() {
                wrapper.style.transform = 'translateY(-2px)';
            });

            input.addEventListener('blur', function() {
                wrapper.style.transform = 'translateY(0)';
            });
        });
    });
</script>