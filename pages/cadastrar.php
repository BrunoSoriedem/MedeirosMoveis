<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/nav-footer.css">
<link rel="stylesheet" href="css/cadastrar.css">

<section id="section-email" data-aos="fade-up">
    <div class="contact-container">
        <div class="login-container">
            <div class="login-header">
                <h2 class="login-title">Crie uma conta Medeiros Móveis</h1>
                    <p class="login-subtitle">Crie sua conta Medeiros Móveis para acompanhar as novidades e
                        promoções.</p>
            </div>

            <div class="login-form">
                <div class="success-message" id="successMessage">
                    <!-- ✅ Login realizado com sucesso! Redirecionando... -->
                </div>

                <form onsubmit="handleLogin(event)">
                    <div class="form-group">
                        <label for="loginEmail">Nome</label>
                        <div class="input-wrapper">
                            <input type="text" id="nomePessoa" class="form-control" required placeholder="Nome">
                            <div class="input-icon-user">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="loginEmail">Endereço de E-mail</label>
                        <div class="input-wrapper">
                            <input type="email" id="loginEmail" class="form-control" required
                                placeholder="exemplo@email.com">
                            <div class="input-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Senha (8-16 caracteres)</label>
                        <div class="input-wrapper">
                            <input type="password" id="loginPassword" class="form-control" required
                                placeholder="Digite sua senha">
                            <button type="button" class="password-toggle"
                                onclick="togglePassword('loginPassword', this)" title="Mostrar/Ocultar senha">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Confirme sua Senha</label>
                        <div class="input-wrapper">
                            <input type="password" id="loginPassword" class="form-control" required
                                placeholder="Confirme sua Senha">
                            <button type="button" class="password-toggle"
                                onclick="togglePassword('loginPassword', this)" title="Mostrar/Ocultar senha">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>



                    <button type="submit" class="login-button" id="loginBtn">
                        Criar conta
                    </button>
                    <div class="forgot-password">
                        <!-- <a href="#" onclick="handleForgotPassword()">Esqueci minha senha</a> -->
                    </div>
                </form>
            </div>

            <div class="register-link">
                <div class="divider">
                    <span>Já tem uma conta?</span>
                </div>
                <p class="p-registerLink">Acesse sua conta aqui, e fique por dentro de nossas promoções</p>
                <a class="register-button" href="entrar">
                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                    Acessar minha conta
                </a>
            </div>
        </div>

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

            function setButtonLoading(buttonId, isLoading) {
                const button = document.getElementById(buttonId);
                if (isLoading) {
                    button.disabled = true;
                    button.innerHTML = '<span class="loading"></span>Entrando...';
                } else {
                    button.disabled = false;
                    button.innerHTML = 'Entrar na minha conta';
                }
            }

            async function handleLogin(event) {
                event.preventDefault();
                const email = document.getElementById('loginEmail').value;
                const password = document.getElementById('loginPassword').value;

                setButtonLoading('loginBtn', true);

                // Simula chamada da API
                await new Promise(resolve => setTimeout(resolve, 2000));

                if (email && password) {
                    document.getElementById('successMessage').style.display = 'block';

                    setTimeout(() => {
                        alert(`🎉 Bem-vindo(a) de volta!\n\nRedirecionando para o painel principal...`);
                        document.getElementById('successMessage').style.display = 'none';
                    }, 1500);
                }

                setButtonLoading('loginBtn', false);
            }

            function handleForgotPassword() {
                const modal = document.createElement('div');
                modal.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.6);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 1000;
                animation: fadeIn 0.3s ease;
                backdrop-filter: blur(5px);
            `;

                modal.innerHTML = `
                <div style="
                    background: white; 
                    padding: 40px; 
                    border-radius: 20px; 
                    max-width: 420px; 
                    text-align: center; 
                    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
                    border: 1px solid var(--border-light);
                ">
                    <div style="
                        width: 64px;
                        height: 64px;
                        background: linear-gradient(135deg, #D4A574, #B8935F);
                        border-radius: 16px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: white;
                        font-size: 24px;
                        margin: 0 auto 24px;
                    ">
                        <i class="fas fa-key"></i>
                    </div>
                    <h3 style="margin-bottom: 16px; color: var(--text-primary); font-size: 20px; font-weight: 600;">Recuperar Senha</h3>
                    <p style="margin-bottom: 32px; color: var(--text-secondary); line-height: 1.6; font-size: 15px;">Enviaremos instruções detalhadas para redefinir sua senha no e-mail cadastrado.</p>
                    <button onclick="this.parentElement.parentElement.remove()" style="
                        background: linear-gradient(135deg, #D4A574, #B8935F); 
                        color: white; 
                        border: none; 
                        padding: 14px 32px; 
                        border-radius: 12px; 
                        cursor: pointer; 
                        font-weight: 600;
                        font-size: 15px;
                        transition: all 0.3s ease;
                    " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(212, 165, 116, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                        <i class="fas fa-check" style="margin-right: 8px;"></i>
                        Entendi
                    </button>
                </div>
            `;

                document.body.appendChild(modal);
            }

            function handleRegisterRedirect() {
                // Simula navegação para página de cadastro
                alert(
                    '🚀 Redirecionando para a página de cadastro...\n\nEm breve você será direcionado para criar sua nova conta!'
                );
            }

            // Efeitos de interação
            document.addEventListener('DOMContentLoaded', function() {
                // Efeito hover nos inputs
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
                        wrapper.querySelector('.input-icon').style.color = 'var(--primary-gold)';
                    });

                    input.addEventListener('blur', function() {
                        wrapper.style.transform = 'translateY(0)';
                        wrapper.querySelector('.input-icon').style.color = 'var(--text-secondary)';
                    });
                });

                document.querySelector('.login-container').style.animation =
                    'slideUp 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
            });

            const style = document.createElement('style');
            style.textContent = `
            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(30px) scale(0.95);
                }
                to {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                }
            }
            
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
        `;
            document.head.appendChild(style);
        </script>