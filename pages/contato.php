<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medeiros Móveis</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Inter", Helvetica, sans-serif;
        }

        [data-aos] {
            z-index: 0;
        }


        html {
            scroll-behavior: smooth;
        }

        html,
        body {
            height: 100%;
            overflow-x: hidden;
        }

        body {
            min-height: 100%;
            margin: 0;
            font-size: 14px;
            letter-spacing: 1px;
            line-height: 1.5;
        }

        main {
            width: 100%;
            padding-top: 5%;
        }

        img {
            vertical-align: middle;
            max-width: 100%;
            display: inline-block;
        }

        #section-email {
            margin: 50px auto;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 50px;
            background: #ffffff;
            width: 500px;
            min-width: 600px;
            margin-top: 150px;
            border: 3px solid rgb(22, 162, 22);
            box-shadow: rgb(16, 17, 16) 5px 25px 43px,
                rgba(37, 129, 3, 0.22) 5px 25px 17px;
            border-radius: 20px;
        }

        #section-email h2 {
            color: #090909;
            font-size: 28px;
            justify-content: left;
            margin-top: -40px;
            padding: 50px;
        }

        #section-email form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        #contatocomigo {
            margin: auto;
            padding: 15px;
            font-size: 30px;
        }

        .encontro {
            padding: 10px;
            margin-bottom: 15px;
        }

        form label {
            color: #0a0a0a;
            font-size: 17px;
            margin-bottom: 4px;
        }

        form input {
            padding: 15px;
            outline: none;
            border: 10;
            margin-bottom: 20px;
            font-size: 15px;
            transition: all 0.5s;
        }

        form input:focus {
            border-radius: 16px;
            border-color: rgb(22, 162, 22);
            box-shadow: 0 0 0 3px rgba(22, 162, 22, 0.25);
            background-color: #fff;
            outline: none;
        }

        form textarea {
            padding: 10px;
            outline: none;
            border: 10;
            font-size: 15px;
            margin-bottom: 30px;
            transition: all 0.5s;
        }

        form textarea:focus {
            border-radius: 16px;
            border-color: rgb(22, 162, 22);
            box-shadow: 0 0 0 3px rgba(22, 162, 22, 0.25);
            background-color: #fff;
            outline: none;
        }

        form button {
            padding: 15px;
            cursor: pointer;
            font-size: 16px;
            background: transparent;
            border: 2px solid #121212;
            color: #0c0c0c;
            transition: all 1s;
            margin-bottom: 20px;
        }

        form button:hover {
            border-radius: 16px;
            color: whitesmoke;
            background: rgb(9, 139, 48);
            /* background: #f5f5f5;
    color: #101026; */
        }
    </style>

<body>

    <section id="section-email">
        <h2 class="h2-form">Entre em Contato Conosco</h2>
        <form action="https://formsubmit.co/brunorafamed.com@gmail.com" method="post">
            <label>Nome</label>
            <input type="text" name="name" placeholder="Digite seu Nome" autocomplete="off" required>
            <label>Telefone</label>
            <input type="text" id="telefone" class="telefone" name="telefone" placeholder="(XX)X XXXX-XXXX"
                autocomplete="off" required>
            <label>E-mail</label>
            <input type="email" name="email" placeholder="Digite seu E-mail" autocomplete="off" required>
            <label>Como nos encontrou?</label>
            <select name="encontro" class="encontro" required>
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
            <input type="text" id="assunto" name="assunto" placeholder="Orçamento, Dúvida..." autocomplete="off"
                required>
            <label>Mensagem</label>
            <input type="hidden" name="_captcha" value="false">
            <input type="hidden" name="_next" value="agradecimento.php">
            <textarea name="message" cols="30" rows="10" placeholder="Digite uma Mensagem" required></textarea>
            <button type="submit" id="enviar-btn">Enviar</button>

            <input type="hidden" name="accessKey" value="5a2f7dd0-f71b-4808-8620-7d2edcf0b568">
        </form>
    </section>



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
                                window.location.href = "https://medeiros-moveis.vercel.app/agradecimento.html";
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