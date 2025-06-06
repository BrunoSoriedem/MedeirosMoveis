<div class="site-container">
    <div class="top-header">
        <div class="escrita-top-header">
            CNPJ: 21.165.079/0001-80 - Juranda / PR
            &nbsp;|&nbsp;
            Medeiros Móveis: A Certeza de um Ótimo Negócio!
        </div>
    </div>
    <header class="header">
        <nav class="nav-desktop">
            <div>
                <a href="index.html" title="logo">
                    <img src="images/logo-loja2.jpg" alt="Logo">
                </a>
            </div>
            <ul>
                <li>
                    <a href="home.php" title="Home">
                        <div class="efeito">Home</div>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" title="Produtos">
                        Produtos
                    </a>
                    <ul class="dropdown-menu">
                        <div class="efeito">
                            <li>
                                <a class="dropdown-item" href="#">
                                    Móveis
                                </a>
                            </li>
                        </div>
                        <div class="efeito">
                            <li>
                                <a class="dropdown-item" href="#">
                                    Planejados
                                </a>
                            </li>
                        </div>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <div class="efeito">
                            <li>
                                <a class="dropdown-item" href="#">
                                    Eletrodomésticos
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li>
                    <a href="sobreNos.html" title="Sobre Nós">
                        <div class="efeito">Sobre Nós</div>
                    </a>
                </li>
                <li>
                    <a href="contato.html" title="Contato">
                        <div class="efeito">
                            Contato
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="main-contato">
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
                <input type="hidden" name="_next" value="https://medeiros-moveis.vercel.app/agradecimento.html">
                <textarea name="message" cols="30" rows="10" placeholder="Digite uma Mensagem" required></textarea>
                <button type="submit" id="enviar-btn">Enviar</button>

                <input type="hidden" name="accessKey" value="5a2f7dd0-f71b-4808-8620-7d2edcf0b568">
            </form>
        </section>



    </main>