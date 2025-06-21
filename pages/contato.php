<link rel="stylesheet" href="css/contato.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


<section id="section-email" data-aos="fade-up">
    <div class="contact-container">
        <div class="form-box">
            <h2 class="h2-form">Entre em Contato Conosco</h2>
            <form id="contact-form" action="https://formsubmit.co/brunorafamed.com@gmail.com" method="post">
                <div class="input-group">
                    <label>Nome</label>
                    <input type="text" name="Nome" placeholder="Digite seu Nome" autocomplete="off" required>
                    <label>Telefone</label>
                    <input type="text" id="telefone" class="telefone" name="Telefone" placeholder="(XX)X XXXX-XXXX"
                        autocomplete="off" required>
                    <label>E-mail</label>
                    <input type="email" name="Email" placeholder="Digite seu E-mail" autocomplete="off" required>
                    <label>Cidade</label>
                    <input type="text" name="Cidade" placeholder="Digite o nome da sua cidade" autocomplete="off"
                        required>
                </div>
                <label>Como nos encontrou?</label>
                <select name="Categoria" required>
                    <option value="" disabled selected>Selecione uma opção</option>
                    <option value="google">Google / Pesquisa Online</option>
                    <option value="instagram">Instagram</option>
                    <option value="facebook">Facebook</option>
                    <option value="whatsapp">WhatsApp</option>
                    <option value="indicacao">Indicação</option>
                    <option value="anuncio">Anúncios</option>
                    <option value="passando">Cliente Fiel</option>
                    <option value="outros">Outros</option>
                </select>
                <label>Assunto</label>
                <input type="text" id="assunto" name="Assunto" placeholder="Orçamento, Dúvida..." autocomplete="off"
                    required>
                <label>Mensagem</label>
                <input type="hidden" name="_captcha" value="false">
                <input type="hidden" name="_next" value="agradecimento">
                <audio id="sucesso-audio" src="audio/confirmation.mp3" preload="auto"></audio>
                <textarea name="Mensagem" cols="30" rows="10" placeholder="Digite uma Mensagem" required></textarea>
                <button type="submit" id="enviar-btn"><i class="fas fa-paper-plane"></i> Enviar Mensagem</button>
                <input type="hidden" name="accessKey" value="5a2f7dd0-f71b-4808-8620-7d2edcf0b568">

            </form>
        </div>
        <div class="info-box">
            <div class="info-card">
                <i class="fas fa-envelope"></i>
                <div>
                    <strong>Email</strong>
                    <p>paulojuranda@hotmail.com</p>
                    <small>Resposta em até 24 horas</small>
                </div>
            </div>
            <div class="info-card">
                <i class="fas fa-phone"></i>
                <div>
                    <strong>Telefone</strong>
                    <p>+55 (44) 9 9987-0212</p>
                    <small>(44) 3569-1763</small>
                </div>
            </div>
            <div class="info-card">
                <i class="fa-solid fa-clock"></i>
                <div>
                    <strong>Horário de Atendimento</strong>
                    <p>Segunda a Sexta: <span>8:00 – 18:00</span><br>
                        Sábado: <span>8:00 – 12:00</span><br>
                        Domingo: <span class="fechado">Fechado</span>
                </div>
            </div>
            <div class="info-card" data-aos="fade-up" data-aos-delay="700">
                <i class="fa-solid fa-location-dot"></i>
                <div>
                    <strong>Localização</strong>
                    <p>Avenida Paraná, 1727</p>
                    <small>Juranda, PR – Brasil</small>
                </div>
            </div>
            <div class="localizacao-mapa">
                <iframe class="mapa-embed"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3632.801918696584!2d-52.84543402464318!3d-24.422948178217474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f27197e45cd78d%3A0x59b345a64ebed629!2sAv.%20Paran%C3%A1%2C%201727%20-%20Juranda%2C%20PR%2C%2087355-000!5e0!3m2!1spt-BR!2sbr!4v1747869210141!5m2!1spt-BR!2sbr"
                    width="100%" height="395" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('contact-form');
        const telefoneInput = document.getElementById('telefone');

        // Máscara e validação do telefone
        telefoneInput.addEventListener('input', function(e) {
            const value = e.target.value.replace(/\D/g, '');
            let formattedValue = '';

            if (value.length > 0) {
                formattedValue = `(${value.substring(0, 2)}`;
            }
            if (value.length > 2) {
                formattedValue += `) ${value.substring(2, 3)}`;
            }
            if (value.length > 3) {
                formattedValue += ` ${value.substring(3, 7)}`;
            }
            if (value.length > 7) {
                formattedValue += `-${value.substring(7, 11)}`;
            }

            e.target.value = formattedValue;

            // Validação
            if (value.length < 10 || value.length > 11) {
                e.target.setCustomValidity('Informe um telefone válido (10 ou 11 dígitos)');
            } else {
                e.target.setCustomValidity('');
            }
        });

        // Envio do formulário
        form.addEventListener('submit', async function(event) {
            event.preventDefault();

            // Validação adicional antes do envio
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            try {
                const enviarBtn = document.getElementById('enviar-btn');
                enviarBtn.disabled = true;
                enviarBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';

                const response = await fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                if (response.ok) {
                    document.getElementById('sucesso-audio').play();
                    await Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Mensagem enviada com sucesso!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    window.location.href = "agradecimento";
                } else {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Erro ao enviar formulário');
                }
            } catch (error) {
                console.error('Erro:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: error.message ||
                        'Ocorreu um erro ao enviar sua mensagem. Por favor, tente novamente mais tarde.',
                    confirmButtonText: 'Entendi'
                });
            } finally {
                const enviarBtn = document.getElementById('enviar-btn');
                if (enviarBtn) {
                    enviarBtn.disabled = false;
                    enviarBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Enviar Mensagem';
                }
            }
        });
    });
</script>
<!-- <script>
    const form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        if (form.checkValidity()) {
            const formData = new FormData(form);

            fetch(form.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (response.ok) {
                        document.getElementById('sucesso-audio').play();

                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "E-mail enviado com sucesso!",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href = "agradecimento";
                        });
                    } else {
                        Swal.fire("Erro", "Tente novamente mais tarde", "error");
                    }
                })
                .catch(error => {
                    Swal.fire("Erro", "Erro ao enviar formulário", "error");
                });
        } else {
            form.reportValidity();
        }
    });

    // Validação e formatação do telefone
    function formatarTelefone(input) {
        const telefone = input.value.replace(/\D/g, '');

        if (telefone.length < 10 || telefone.length > 12) {
            input.setCustomValidity("Informe um número de telefone válido.");
        } else {
            input.setCustomValidity("");
        }

        if (telefone.length === 11) {
            input.value = telefone.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
        } else if (telefone.length === 10) {
            input.value = telefone.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const telefoneInput = document.getElementById('telefone');
        telefoneInput.addEventListener('input', function() {
            formatarTelefone(this);
        });
    });
</script> -->