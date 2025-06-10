<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medeiros Móveis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&family=Rajdhani:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Ancizar+Serif:ital,wght@0,300..900;1,300..900&family=Orbitron:wght@400..900&family=Rajdhani:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Ancizar+Serif:ital,wght@0,300..900;1,300..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Orbitron:wght@400..900&family=Rajdhani:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&family=Rajdhani:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="css/contato.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sobreNos.css"> -->
    <link rel="stylesheet" href="css/nav-footer.css">
    <link href="images/logo-loja.png" rel="shortcut icon">

    <base href="http://localhost/Medeiros-Moveis/">
</head>

<body class="fundo" id="top">
    <div class="site-container">
        <div class="top-header">
            <div class="escrita-top-header">
                CNPJ: 21.165.079/0001-80 - Juranda / PR
                &nbsp;|&nbsp;
                Medeiros Móveis: A Certeza de um Ótimo Negócio!
            </div>
        </div>
        <header class="header">
            <nav class="navbar navbar-expand-lg bg-white">
                <div class="container-fluid">
                    <a class="navbar-brand" href="home" title="logo">
                        <img src="images/logo-loja2.jpg" alt="Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="home">
                                    <div class="efeito">
                                        Home
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="produtos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="efeito">
                                        Produtos
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">
                                            <div class="efeito">
                                                Móveis
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="#">
                                            <div class="efeito">Planejados
                                            </div>
                                        </a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">
                                            <div class="efeito">Estofados</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="#">
                                            <div class="efeito">Eletrodomésticos</div>
                                        </a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="sobreNos">
                                    <div class="efeito">Sobre Nós</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contato">
                                    <div class="efeito">Contato</div>
                                </a>
                            </li>
                    </div>
                </div>
            </nav>
        </header>

        <main class="container">

            <?php
            include "arrays.php";

            $pagina = $_GET["param"] ?? "home";

            //home -> pages/home.php
            $pagina = "pages/{$pagina}.php";

            //verificar se a página existe
            if (file_exists($pagina)) {
                include $pagina;
            } else {
                include "pages/erro.php";
            }

            ?>

        </main>

        <hr class="hr-footer">
        <footer class="footer">
            <div class="grid text-center">
                <div class="g-col-6 g-col-md-4" id="infos-endereco-logo-redes">
                    <img class="logo-footer" src="images/logo-loja2.jpg">
                    <p class="info-footer-endereco">
                        Av. Paraná, 1727 - Centro
                        <br>
                        Juranda/PR CNPJ
                        <br>
                        21.165.079/0001-80
                    </p>
                    <p class="redes">
                        <a href="https://www.facebook.com/medeirosmoveis.juranda" target="_blank"
                            rel="noopener noreferrer" title="Facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/medeirosmoveisjuranda/" target="_blank"
                            rel="noopener noreferrer" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/554499870212?text=Olá,%20gostaria%20de%20um%20orçamento" target="_blank"
                            rel="noopener noreferrer" title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </p>
                    <div class="produtos-topicos">
                        <ul class="ul-footer">
                            <li>
                                Móveis Estilosos
                            </li>
                            <li>
                                Eletros de Qualidade
                            </li>
                            <li>
                                Modulados Medida
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="g-col-6 g-col-md-4">
                    <img src="images/pai-removebg-preview.png" alt="teste" class="img-paulo">
                </div>

                <div class="g-col-6 g-col-md-4">
                    <ul>
                        <div class="conteudo-atendimento">
                            <li class="nome-atendimento">
                                <a href="#" title="Atendimentos">
                                    <div class="topicos-footer">ATENDIMENTOS</div>
                                    <i class="fa-regular fa-phone-volume"></i>
                                    <div class="div-infos-topicos-footer">
                                        <span class="infos-topicos-footer">Compre por Telefone</span>
                                    </div>
                                    <p class="fone-topicos-footer">(44)3569-1763</p>
                                </a>
                            </li>
                            <hr class="separador-footer">
                            <li class="nome-whatsapp">
                                <a href="#" title="WhatsApp">
                                    <div class="topicos-footer2">Fale no WhatsApp</div>
                                    <i class="fa-brands fa-whatsapp fa-xs"></i>
                                    <div class="div-infos-topicos-footer">
                                        <span class="infos-topicos-footer">Consultor (a)</span>
                                    </div>
                                    <p class="fone-topicos-footer">(44)99987-0212</p>
                                </a>
                            </li>
                            <hr class="separador-footer">
                            <li class="nome-atendimento">
                                <a href="#" title="Atendimentos">
                                    <div class="topicos-footer">Entre em Contato</div>
                                    <i class="fa-solid fa-at"></i>
                                    <div class="div-infos-topicos-footer">
                                        <span class="infos-topicos-footer">Nosso E-mail</span>
                                    </div>
                                    <p class="fone-topicos-footer">paulojuranda@hotmail.com</p>
                                </a>
                            </li>

                            <hr class="separador-footer">
                            <li class="nome-atendimento">
                                <a href="#" title="Atendimentos">
                                    <div class="topicos-footer">HORÁRIO DE ATENDIMENTO</div>
                                    <span class="infos-topicos-footer" id="hora-atendimento">
                                        Segunda à Sexta das 8h às 18h
                                        <br>
                                        Sábado das 8h às 12h
                                    </span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
            <hr class="hr-footer">
            <div class="footer-content">
                <p class="copyright">
                    <strong>
                        Copyright © 2025 Medeiros Móveis Juranda

                    </strong>
                </p>
                <p class="dev">
                    Developed by Bruno Medeiros
                </p>

            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
            crossorigin="anonymous"></script>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/aos.js"></script>
        <!-- <script src="js/contagem.js"></script>
        <script src="js/rolar.js"></script> -->
        <script src="js/swiper.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="js/index.js"></script>
        <!-- <script src="js/sobreNos.js"></script> -->
        <script>
            AOS.init({
                duration: 1000,
                easing: 'ease-in-out',
                once: false,
                offset: 100
            });
        </script>



</body>

</html>