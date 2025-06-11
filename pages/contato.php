<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Medeiros Móveis</title>

    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/contato.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body>
    <section id="section-email" data-aos="fade-up">
        <div class="contact-container">
            <div class="form-box">
                <h2 class="h2-form">Entre em Contato Conosco</h2>
                <form id="contact-form" action="https://formsubmit.co/brunorafamed.com@gmail.com" method="post">
                    <div class="input-group">
                        <label>Nome</label>
                        <input type="text" name="name" placeholder="Digite seu Nome" autocomplete="off" required>
                        <label>Telefone</label>
                        <input type="text" id="telefone" class="telefone" name="telefone" placeholder="(XX)X XXXX-XXXX"
                            autocomplete="off" required>
                        <label>E-mail</label>

                        <input type="email" name="email" placeholder="Digite seu E-mail" autocomplete="off" required>
                    </div>
                    <label>Como nos encontrou?</label>
                    <select name="categoria" required>
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
                    <input type="text" id="assunto" name="assunto" placeholder="Orçamento, Dúvida..." autocomplete="off" required>
                    <label>Mensagem</label>
                    <input type="hidden" name="_captcha" value="false">
                    <input type="hidden" name="_next" value="agradecimento">
                    <textarea name="mensagem" cols="30" rows="10" placeholder="Digite uma Mensagem" required></textarea>
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
                        <small>3569-1763</small>
                    </div>
                </div>
                <div class="info-card">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <strong>Localização</strong>
                        <p>Avenida Paraná, 1727</p>
                        <small>Juranda, PR – Brasil</small>
                    </div>
                </div>
                <div class="horario">
                    <strong>Horário de Atendimento</strong>
                    <p>Segunda a Sexta: <span>8:00 – 18:00</span><br>
                        Sábado: <span>8:00 – 12:00</span><br>
                        Domingo: <span class="fechado">Fechado</span>
                    </p>
                </div>
            </div>
        </div>
    </section>



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
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "E-mail enviado com sucesso!",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.href = "agradecimento.html";
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
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
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "E-mail enviado com sucesso!",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.href = "agradecimento.html";
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
    </script>

</body>

</html>