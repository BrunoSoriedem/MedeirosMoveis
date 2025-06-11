<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Medeiros Móveis</title>

    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/produtos.css">
</head>

<main>
    <!-- Seção Hero -->
    <section class="hero">
        <div class="hero-content">
            <h1>Móveis que Transformam seu Espaço</h1>
            <p>Descubra nossa coleção premium de móveis feitos com materiais sustentáveis e design inovador.</p>
            <a href="#featured" class="btn">Ver Coleção</a>
        </div>
    </section>

    <!-- Seção Destaques -->
    <section class="featured" id="featured">
        <div class="section-title">
            <h2>Nossos Destaques</h2>
        </div>
        <div class="products-grid">
            <div class="product-card">
                <span class="tag">Novidade</span>
                <img src="imagens/Moveis/cristaleira alta linz.jpg" alt="Sofá Premium" class="product-img">
                <div class="product-info">
                    <h3>Sofá Premium</h3>
                    <p>Sofá em couro ecológico com design ergonômico para máximo conforto.</p>
                    <span class="price">R$ 3.499,00</span>
                    <a href="#" class="btn">Detalhes</a>
                </div>
            </div>

            <div class="product-card">
                <span class="tag">Mais Vendido</span>
                <img src="imagens/Moveis/Prateleira Escritorio.jpg" alt="Mesa de Jantar" class="product-img">
                <div class="product-info">
                    <h3>Mesa de Jantar</h3>
                    <p>Mesa em madeira de reflorestamento com acabamento premium.</p>
                    <span class="price">R$ 2.899,00</span>
                    <a href="#" class="btn">Detalhes</a>
                </div>
            </div>

            <div class="product-card">
                <img src="product3.jpg" alt="Cama King Size" class="product-img">
                <div class="product-info">
                    <h3>Cama King Size</h3>
                    <p>Estrutura sólida em carvalho com cabeceira estofada.</p>
                    <span class="price">R$ 4.199,00</span>
                    <a href="#" class="btn">Detalhes</a>
                </div>
            </div>

            <div class="product-card">
                <span class="tag">Promoção</span>
                <img src="product4.jpg" alt="Armário Moderno" class="product-img">
                <div class="product-info">
                    <h3>Armário Moderno</h3>
                    <p>Design minimalista com amplo espaço interno e portas de correr.</p>
                    <span class="price">R$ 3.799,00</span>
                    <a href="#" class="btn">Detalhes</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Categorias -->
    <section class="categories">
        <div class="section-title">
            <h2>Nossas Categorias</h2>
        </div>
        <div class="categories-grid">
            <div class="category-card">
                <img src="imagens/Moveis/cristaleira alta linz.jpg" alt="Sala de Estar" class="category-img">
                <div class="category-overlay">
                    <h3>Sala de Estar</h3>
                    <a href="#">Ver Coleção <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="category-card">
                <img src="imagens/Moveis/cristaleira alta linz.jpg" alt="Quarto" class="category-img">
                <div class="category-overlay">
                    <h3>Quarto</h3>
                    <a href="#">Ver Coleção <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="category-card">
                <img src="imagens/Moveis/cristaleira alta linz.jpg" alt="Cozinha" class="category-img">
                <div class="category-overlay">
                    <h3>Cozinha</h3>
                    <a href="#">Ver Coleção <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="category-card">
                <img src="imagens/Moveis/cristaleira alta linz.jpg" alt="Escritório" class="category-img">
                <div class="category-overlay">
                    <h3>Escritório</h3>
                    <a href="#">Ver Coleção <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Depoimentos -->
    <section class="testimonials">
        <div class="section-title">
            <h2>O que Nossos Clientes Dizem</h2>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <p class="testimonial-text">"Comprei um sofá há 2 anos e ainda parece novo. A qualidade dos materiais é impressionante!"</p>
                <p class="testimonial-author">- Ana Carolina</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>

            <div class="testimonial-card">
                <p class="testimonial-text">"Atendimento excelente e os móveis chegaram antes do prazo. Super recomendo!"</p>
                <p class="testimonial-author">- Roberto Almeida</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>

            <div class="testimonial-card">
                <p class="testimonial-text">"Adorei o design sustentável dos produtos. Meu apartamento ficou lindo e eco-friendly."</p>
                <p class="testimonial-author">- Juliana Santos</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    // Efeito de scroll suave
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Animação ao rolar
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.product-card, .category-card, .testimonial-card');

        elements.forEach(element => {
            const elementPosition = element.getBoundingClientRect().top;
            const screenPosition = window.innerHeight / 1.3;

            if (elementPosition < screenPosition) {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }
        });
    };

    // Configuração inicial para elementos animados
    window.addEventListener('DOMContentLoaded', () => {
        const animatedElements = document.querySelectorAll('.product-card, .category-card, .testimonial-card');
        animatedElements.forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(20px)';
            element.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        });

        // Dispara uma vez após o carregamento
        setTimeout(animateOnScroll, 300);
    });

    // Dispara durante o scroll
    window.addEventListener('scroll', animateOnScroll);
</script>
</head>

</html>