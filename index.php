<?php
session_start();
$base = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
?>

<?php

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=dados-medeirosmoveis;charset=utf8",
        "root",
        "dados-medeirosMoveis"
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id_usuario = $_SESSION['usuario_id'] ?? null;
    $perfil = null;

    if ($id_usuario) {
        $stmt = $pdo->prepare("SELECT perfil_acesso FROM contascadastradas WHERE id = ?");
        $stmt->execute([$id_usuario]);
        $perfil = $stmt->fetchColumn();
    }
} catch (PDOException $e) {
    die("Erro no banco: " . $e->getMessage());
}

$perfil = strtolower(trim($perfil));

$temAcessoCadastro = ($perfil === 'master');

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medeiros Móveis</title>
    <base href="<?= $base ?>">

    <link href="images/logo-loja.png" rel="shortcut icon">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ancizar+Serif:ital,wght@0,300..900;1,300..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Orbitron:wght@400..900&family=Rajdhani:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/nav-footer.css">
    <link rel="stylesheet" href="/css/aos.css">
</head>

<body class="fundo" id="top">
    <div class="site-container">
        <div class="top-header">
            <div class="escrita-top-header">
                Avenida Paraná, 1727 - Juranda / PR
                &nbsp;|&nbsp;
                Medeiros Móveis: A Certeza de um Ótimo Negócio!
            </div>
        </div>
        <header class="header" data-aos="fade-down">
            <nav class="navbar navbar-expand-lg bg-white">
                <div class="container-fluid">
                    <a class="navbar-brand" href="home" title="logo" data-aos="fade-right">
                        <img src="imagens/logo-loja2.jpg" alt="Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item" data-aos="fade-up" data-aos-delay="100">
                                <a class="nav-link active" aria-current="page" href="home">
                                    <div class="efeito">Home</div>
                                </a>
                            </li>

                            <li class="nav-item dropdown" data-aos="fade-up" data-aos-delay="200">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <div class="efeito">Produtos</div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li data-aos="fade-left" data-aos-delay="300">
                                        <a class="dropdown-item" href="/Medeiros-Moveis/produto?categoria=moveis">
                                            <div class="efeito">Móveis</div>
                                        </a>
                                    </li>
                                    <li data-aos="fade-left" data-aos-delay="400">
                                        <a class="dropdown-item" href="/Medeiros-Moveis/produto?categoria=planejados">
                                            <div class="efeito">Planejados</div>
                                        </a>
                                    </li>
                                    <li data-aos="fade-left" data-aos-delay="500">
                                        <a class="dropdown-item" href="/Medeiros-Moveis/produto?categoria=estofados">
                                            <div class="efeito">Estofados</div>
                                        </a>
                                    </li>
                                    <li data-aos="fade-left" data-aos-delay="600">
                                        <a class="dropdown-item" href="/Medeiros-Moveis/produto?categoria=eletros">
                                            <div class="efeito">Eletrodomésticos</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item" data-aos="fade-up" data-aos-delay="300">
                                <a class="nav-link" href="sobreNos">
                                    <div class="efeito">Sobre Nós</div>
                                </a>
                            </li>
                            <li class="nav-item" data-aos="fade-up" data-aos-delay="400">
                                <a class="nav-link" href="contato">
                                    <div class="efeito">Contato</div>
                                </a>
                            </li>

                            <?php if ($temAcessoCadastro): ?>
                                <li class="nav-item dropdown" data-aos="fade-up" data-aos-delay="200">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <div class="efeito">Cadastros</div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li data-aos="fade-left" data-aos-delay="300">
                                            <a class="dropdown-item" href="cadFuncionarios">
                                                <div class="efeito">Funcionários</div>
                                            </a>
                                        </li>
                                        <li data-aos="fade-left" data-aos-delay="600">
                                            <a class="dropdown-item" href="cadProdutos">
                                                <div class="efeito">Produtos</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>

                            <li class="nav-item user-dropdown" data-aos="fade-up" data-aos-delay="500"
                                style="display:flex; align-items:center;">
                                <span class="escrita-enter">
                                    <i class="fa-solid fa-circle-user" id="icon-user">
                                    </i>
                                </span>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="entrar">
                                            <div class="efeito">Entrar</div>
                                        </a>
                                    </li>
                                    <li><a class="dropdown-item" href="cadastrar">
                                            <div class="efeito">Cadastrar</div>
                                        </a>
                                    </li>
                                    <li><a class="dropdown-item" href="areaUsuario">
                                            <div class="efeito">Área do Cliente</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
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
            } ?>

        </main>

        <hr class="hr-footer">
        <a href="https://wa.me/554499870212?text=Olá,%20gostaria%20de%20um%20orçamento" class="whatsapp-float"
            target="_blank" aria-label="WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
        <footer class="footer">
            <div class="container-footer">
                <div class="footer-col">
                    <img src="imagens/logo-loja2.jpg" alt="Logo Medeiros Móveis" class="footer-logo" />
                    <p class="footer-text">
                        Av. Paraná, 1727 - Centro<br />
                        Juranda/PR<br />
                        CNPJ: 21.165.079/0001-80
                    </p>

                    <div class="footer-social">
                        <a href="https://www.facebook.com/medeirosmoveis.juranda" target="_blank" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/medeirosmoveisjuranda/" target="_blank" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/554499870212?text=Olá,%20gostaria%20de%20um%20orçamento" target="_blank"
                            title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>

                    <ul class="footer-list">
                        <li>Móveis Estilosos</li>
                        <li>Planejados Sob Medida</li>
                        <li>Estofados Confortáveis</li>
                        <li>Eletros de Qualidade</li>
                    </ul>
                </div>

                <div class="footer-col center-col">
                    <img src="imagens/img-pai-beleza.png" alt="Proprietario" class="footer-img" />
                </div>

                <div class="footer-col">
                    <h4>Atendimento</h4>
                    <div class="contact-box">
                        <i class="fas fa-phone-alt"></i>
                        <div>
                            <p class="contact-title">Compre por Telefone</p>
                            <p class="contact-info">(44) 3569-1763</p>
                        </div>
                    </div>
                    <div class="contact-box">
                        <i class="fa-brands fa-square-whatsapp" style="color: #000000;"></i>
                        <div>
                            <p class="contact-title">Fale no WhatsApp</p>
                            <p class="contact-info">(44) 99987-0212</p>
                        </div>
                    </div>
                    <div class="contact-box">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <p class="contact-title">Nosso E-mail</p>
                            <p class="contact-info">paulojuranda@hotmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© 2025 Medeiros Móveis. Todos os direitos reservados.</p>
                <p>
                    <a href="https://www.instagram.com/brunormedeiros_/" target="_blank"
                        title="Clique e saiba mais sobre mim">Desenvolvido por Bruno Medeiros</a>
                </p>
            </div>
        </footer>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
</script>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/swiper.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="js/index.js"></script>
<script>
    AOS.init({
        duration: 1000,
        easing: 'ease-in-out',
        once: false,
        offset: 100
    });

    const scrollConfig = {
        startFade: 50,
        maxScroll: 400,
        minOpacity: 0.85,
        shadowStart: 'rgba(0, 0, 0, 0.3)',
        shadowEnd: 'rgba(0, 0, 0, 0.5)'
    };

    function updateHeader() {
        const scrollTop = $(window).scrollTop();
        const header = $('.header');
        const navbar = $('.navbar');

        let opacity = 1;
        if (scrollTop > scrollConfig.startFade) {
            const progress = Math.min((scrollTop - scrollConfig.startFade) /
                (scrollConfig.maxScroll - scrollConfig.startFade), 1);
            opacity = 1 - (progress * (1 - scrollConfig.minOpacity));
        }

        header.css('opacity', opacity);

        if (scrollTop > 50) {
            navbar.css('box-shadow', `0 2px 20px ${scrollConfig.shadowEnd}`);
        } else {
            navbar.css('box-shadow', `0 2px 20px ${scrollConfig.shadowStart}`);
        }
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const produtosDropdown = document.querySelector('.nav-item.dropdown');
        const produtosLink = produtosDropdown.querySelector('.dropdown-toggle');

        const currentPage = window.location.pathname.split('/').pop();
        const isProdutoPage = currentPage === 'produto' || currentPage.includes('produto?');

        produtosLink.addEventListener('click', function(e) {
            if (isProdutoPage) {
                e.preventDefault();
                const dropdownMenu = this.nextElementSibling;
                dropdownMenu.classList.toggle('show');
            }
        });

        document.addEventListener('click', function(e) {
            if (!produtosDropdown.contains(e.target)) {
                const dropdownMenu = produtosDropdown.querySelector('.dropdown-menu');
                dropdownMenu.classList.remove('show');
            }
        });

        const dropdownItems = produtosDropdown.querySelectorAll('.dropdown-item');
        dropdownItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const userDropdown = document.querySelector('.user-dropdown');
        const dropdownMenu = userDropdown.querySelector('.dropdown-menu');

        userDropdown.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.style.display =
                dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', function() {
            dropdownMenu.style.display = 'none';
        });
    });
</script>