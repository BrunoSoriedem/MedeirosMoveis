<?php
require_once __DIR__ . '/../config/sessao.php';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=dados-medeirosmoveis;charset=utf8", "root", "dados-medeirosMoveis");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM produtos");
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro no banco: " . $e->getMessage());
}

$categorias = ['moveis' => [], 'planejados' => [], 'estofados' => [], 'eletros' => []];
$novidades = [];
$maisVendidos = [];

foreach ($produtos as $p) {
    foreach ($categorias as $cat => $_) {
        if (strtolower($p[$cat]) === 'sim') {
            $categorias[$cat][] = $p;
        }
    }
    if (strtolower($p['novidade']) === 'sim') $novidades[] = $p;
    if (strtolower($p['maisVendido']) === 'sim') $maisVendidos[] = $p;
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/nav-footer.css">

<section class="swiper-section" data-aos="zoom-in" data-aos-delay="100">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide-com-overlay" id="slide1">
                <img id="fundoPrimeiro-slide" src="imagens/frenteLojaFotografo.jpg" alt="Guarda Roupa">
                <div class="conteudo-sobreposto">
                    <h1><span class="destaque">Móveis Planejados</span> com excelência nos detalhes.</h1>
                    <p>Projetos sob medida que unem conforto, elegância e funcionalidade.</p>
                    <a href="https://wa.me/554499870212?text=Olá,%20gostaria%20de%20um%20orçamento" target="_blank"
                        class="botao-rede">
                        <i class="fab fa-whatsapp"></i> Solicite um orçamento
                    </a>
                </div>
            </div>

            <div class="swiper-slide slide-com-overlay" id="slide2">
                <img src="imagens/eletros/geladeira-3-portas.jpg" alt="Colchão Gazin">
                <div class="conteudo-sobreposto-direito">
                    <h1>Neste mês de <span class="destaque">Setembro</span></h1>
                    <p>
                        A loja inteira está em promoção para o <span class="destaque">nosso fecha mês</span>! <br>
                        Aproveite descontos de até <span class="destaque">50%</span> em todos os produtos. <br><br>
                        É o momento perfeito para planejar toda sua casa. <br>
                        Não perca! Esperamos por você com ofertas imperdíveis!
                    </p>

                </div>
            </div>
            <div class="swiper-slide slide-com-overlay" id="slide3">
                <img src="imagens/planejados/cozinha-clara-e-geladeira.jpg" alt="Mesas">
                <div class="conteudo-sobreposto">
                    <h1><span class="destaque">20 anos</span> de tradição e qualidade em móveis.</h1>
                    <p>
                        Duas décadas transformando lares com dedicação, bom gosto e compromisso. <br>
                        Aqui, cada móvel conta uma história — a sua.
                    </p>
                    <a href="https://wa.me/554499870212?text=Olá,%20gostaria%20de%20fazer%20um%20orçamento"
                        target="_blank" class="botao-rede">
                        <i class="fab fa-whatsapp"></i> Fale com nossa equipe
                    </a>
                </div>

            </div>
            <div class="swiper-slide slide-com-overlay" id="slide4">
                <img src="imagens/estofados/Sofa-Preto-8p.jpg" alt="Mesas">
                <div class="conteudo-sobreposto-direito">
                    <h1>Estamos também nas <span class="destaque">Redes Sociais</span></h1>
                    <p>
                        Acompanhe nossas novidades, promoções e projetos exclusivos. <br>
                        Siga-nos e fique por dentro de tudo que acontece por aqui!
                    </p>
                    <div class="redes-sociais">
                        <a href="https://www.instagram.com/medeirosmoveisjuranda/" target="_blank" class="botao-rede">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com/medeirosmoveis.juranda" target="_blank" class="botao-rede">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="https://wa.me/554499870212?text=Olá,%20vi%20vocês%20nas%20redes%20sociais!"
                            target="_blank" class="botao-rede">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>

    </div>
</section>

<section class="section-2">
    <div class="container">

        <h2 class="main-title">O que você evita sendo um cliente Medeiros Móveis?</h2>

        <div class="benefits-grid">

            <div class="benefit-card">
                <div class="benefit-icon"></div>
                <h3 class="benefit-title">Atrasos na Montagem</h3>
                <p class="benefit-description">
                    Nossa equipe de montadores/entregadores estão sempre a disposição,
                    para atender conforme a necessidade dos clientes.
                </p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon"></div>
                <h3 class="benefit-title">Itens Avariados</h3>
                <p class="benefit-description">
                    Os itens dos nossos fornecedores e fabricantes chegam até nós devidamente protegidos com papelão,
                    plástico bolha e plástico stretch, garantindo sua integridade até o momento da entrega.
                </p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon"></div>
                <h3 class="benefit-title">Móveis Caros</h3>
                <p class="benefit-description">
                    Trabalhamos com uma política de preços justos e condições diferenciadas, para contribuir
                    com nossos clientes
                </p>
            </div>
        </div>

        <div class="stats-section">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number" id="counter1">0</div>
                    <div class="stat-description">
                        anos no Ramo dos Móveis entregando Planejados, Eletros, Estofados, e tudo que o cliente precisa,
                        com Qualidade, Integridade, Confiança e Agilidade.
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="counter2">0</div>
                    <div class="stat-description">
                        Famílias e Clientes satisfeitos com os móveis, e atendimento de nossa empresa.
                        <br>
                        Sempre lhe oferecendo a Certeza de um Ótimo Negócio.
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="counter3">0</div>
                    <div class="stat-description">
                        Premiações em nosso munícipio, entre eles, melhor loja,
                        melhor empesário e melhores vendedores.
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="featured" id="featured">
    <div class="section-title">
        <h2 class="text text-center">Nossas Categorias</h2>
    </div>
    <div class="products-grid">
        <?php foreach ($categorias as $cat => $produtosCat): ?>
            <div class="product-card">

                <?php if (!empty($produtosCat)): ?>

                    <img src="<?= htmlspecialchars($produtosCat[0]['diretorio_imagem']) ?>"
                        alt="<?= htmlspecialchars($produtosCat[0]['descricao']) ?>" class="product-img">
                    <div class="product-info">
                        <h2 class="text text-center"><?= ucfirst($cat) ?></h2>
                        <a href="produto?categoria=<?= $cat ?>" class="btn">Saiba Mais</a>
                    </div>
                <?php endif; ?>
            </div>

        <?php endforeach; ?>

    </div>
</section>

<section class="section-produtos-novidades">
    <h2 class="text text-center">Conheça as novidades</h2>
    <div class="swiper novidadesSwiper">
        <div class="swiper-wrapper">
            <?php foreach ($novidades as $item): ?>
                <div class="swiper-slide slideInUp">
                    <div class="card-produto">
                        <img src="<?= htmlspecialchars($item['diretorio_imagem']) ?>"
                            alt="<?= htmlspecialchars($item['descricao']) ?>">
                        <div class="tags"><span class="tag novidade">Novidade</span></div>
                        <h3><?= htmlspecialchars($item['descricao']) ?></h3>
                        <div class="avaliacao">★★★★★</div>
                        <p class="preco-novo">R$ <?= number_format($item['precoAV'], 2, ',', '.') ?></p>
                        <p class="preco-info">R$ <?= number_format($item['precoAP'], 2, ',', '.') ?></p>
                        <button class="btn-whatsapp" data-phone="5544999870212">
                            <i class="fa-brands fa-whatsapp"></i> Comprar no WhatsApp
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>

    <h2 class="text text-center">Os mais Vendidos</h2>
    <div class="swiper maisVendidosSwiper">
        <div class="swiper-wrapper">
            <?php foreach ($maisVendidos as $item): ?>
                <div class="swiper-slide slideInUp">
                    <div class="card-produto">
                        <img src="<?= htmlspecialchars($item['diretorio_imagem']) ?>"
                            alt="<?= htmlspecialchars($item['descricao']) ?>">
                        <h3><?= htmlspecialchars($item['descricao']) ?></h3>
                        <div class="avaliacao">★★★★★</div>
                        <p class="preco-novo">R$ <?= number_format($item['precoAV'], 2, ',', '.') ?></p>
                        <p class="preco-info">R$ <?= number_format($item['precoAP'], 2, ',', '.') ?></p>
                        <button class="btn-whatsapp" data-phone="5544999870212">
                            <i class="fa-brands fa-whatsapp"></i> Comprar no WhatsApp
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<section id="testimonials">
    <div id="testimonials_header">
        <h1>Avaliações</h1>
        <h2 class="text text-center">O que os clientes dizem</h2>
        <p>
            Quer saber o que torna a nossa empresa tão especial? Confira o que nossos clientes
            têm a dizer!
        </p>
    </div>

    <div class="swiper mySwiper-testimonials">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="testimonial-card">
                    <div class="testimonial-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="testimonial-quote">"Nossa referência em loja de móveis.
                        Atendimento de excelência e garantia de satisfação nos produtos.
                    <div class="testimonial-author">
                        <img src="imagens/avatar1.jpg" alt="Cliente" class="avatar" />
                        <div>
                            <h3>Keila Lima Favarão</h3>
                            <p>Cliente desde 2016</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="testimonial-card">
                    <div class="testimonial-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="testimonial-quote">"Loja com boas opções em móveis
                        sob medida para atender melhor o cliente.
                        Bom atendimento e variedade."</p>
                    <div class="testimonial-author">
                        <img src="imagens/avatar2.jpg" alt="Cliente" class="avatar" />
                        <div>
                            <h3>Alessandro de Oliveira</h3>
                            <p>Cliente desde 2014</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="testimonial-card">
                    <div class="testimonial-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="testimonial-quote">"Qualidade dos móveis é surpreendente,
                        os móveis da minha casa eu só compro na Medeiros Móveis.</p>
                    <div class="testimonial-author">
                        <img src="imagens/avatar3.jpg" alt="Cliente" class="avatar" />
                        <div>
                            <h3>Carlos Mendes</h3>
                            <p>Cliente desde 2021</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="testimonial-card">
                    <div class="testimonial-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="testimonial-quote">"Encontrei ótimas opções de móveis planejados, com atendimento
                        excelente e variedade para todos os gostos."</p>
                    <div class="testimonial-author">
                        <img src="imagens/avatar4.png" alt="Cliente" class="avatar" />
                        <div>
                            <h3>Paulo Sérgio</h3>
                            <p>Cliente desde 2013</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="testimonial-card">
                    <div class="testimonial-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="testimonial-quote">"Gostei bastante! Atendimento ótimo e muita variedade de produtos
                        pra escolher."</p>
                    <div class="testimonial-author">
                        <img src="imagens/avatar5.jpg" alt="Cliente" class="avatar" />
                        <div>
                            <h3>Henrique Pedro</h3>
                            <p>Cliente desde 2019</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="testimonial-card">
                    <div class="testimonial-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="testimonial-quote">"Atendimento nota 10 e muitos modelos de móveis que se
                        adaptaram ao que eu precisava."</p>
                    <div class="testimonial-author">
                        <img src="imagens/avatar6.jpg" alt="Cliente" class="avatar" />
                        <div>
                            <h3>Silvia Figueiredo</h3>
                            <p>Cliente desde 2011</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="testimonial-card">
                    <div class="testimonial-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="testimonial-quote">"A loja tem várias opções de móveis e eletros, tudo muito bonito e do
                        jeitinho que eu precisava."</p>
                    <div class="testimonial-author">
                        <img src="imagens/avatar7.jpg" alt="Cliente" class="avatar" />
                        <div>
                            <h3>Ana Isabela</h3>
                            <p>Cliente desde 2020</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<section class="categories">
    <section class="faq-section">
        <div class="container">
            <h2 class="faq-title">Perguntas Frequentes sobre Móveis</h2>

            <div class="accordion accordion-flush" id="moveisFaqAccordion">
                <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq-collapse-1" aria-expanded="false" aria-controls="faq-collapse-1">
                            Como escolher o móvel ideal para meu espaço?
                        </button>
                    </h3>
                    <div id="faq-collapse-1" class="accordion-collapse collapse" data-bs-parent="#moveisFaqAccordion">
                        <div class="accordion-body">
                            Para escolher o móvel ideal, primeiro <span class="highlight">meça seu espaço</span> com
                            precisão. Considere a funcionalidade desejada, o estilo da decoração existente e o orçamento
                            disponível. Lembre-se de deixar espaço para circulação e verifique se as portas e gavetas
                            têm abertura livre. O móvel deve ser proporcional ao ambiente, nem muito grande nem muito
                            pequeno.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq-collapse-2" aria-expanded="false" aria-controls="faq-collapse-2">
                            Qual a diferença entre MDF, MDP e madeira maciça?
                        </button>
                    </h3>
                    <div id="faq-collapse-2" class="accordion-collapse collapse" data-bs-parent="#moveisFaqAccordion">
                        <div class="accordion-body">
                            <span class="highlight">MDF</span> é feito de fibras de madeira prensadas, oferecendo
                            acabamento liso e uniforme. <span class="highlight">MDP</span> utiliza partículas de
                            madeira, sendo mais econômico mas menos resistente à umidade. <span
                                class="highlight">Madeira maciça</span> é natural, mais durável e nobre, porém com custo
                            superior. Cada material tem suas vantagens dependendo do uso e orçamento.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq-collapse-3" aria-expanded="false" aria-controls="faq-collapse-3">
                            Como cuidar e manter meus móveis em bom estado?
                        </button>
                    </h3>
                    <div id="faq-collapse-3" class="accordion-collapse collapse" data-bs-parent="#moveisFaqAccordion">
                        <div class="accordion-body">
                            Para manter seus móveis em perfeito estado: <span class="highlight">limpe
                                regularmente</span> com pano seco ou levemente úmido, evite produtos químicos
                            agressivos, proteja da luz solar direta e umidade excessiva. Use cera específica para
                            madeira mensalmente, coloque protetores sob objetos que possam riscar e faça manutenção
                            preventiva nas dobradiças e puxadores.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq-collapse-4" aria-expanded="false" aria-controls="faq-collapse-4">
                            Móveis planejados ou móveis prontos: qual escolher?
                        </button>
                    </h3>
                    <div id="faq-collapse-4" class="accordion-collapse collapse" data-bs-parent="#moveisFaqAccordion">
                        <div class="accordion-body">
                            <span class="highlight">Móveis planejados</span> oferecem personalização total,
                            aproveitamento máximo do espaço e acabamento exclusivo, mas têm custo e prazo maiores. <span
                                class="highlight">Móveis prontos</span> são mais econômicos, entrega imediata e
                            facilidade de troca, porém com limitações de tamanho e personalização. A escolha depende do
                            orçamento, prazo e necessidades específicas do projeto.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var novidadesSwiper = new Swiper(".novidadesSwiper", {
            slidesPerView: 5,
            spaceBetween: 15,
            loop: true,
            navigation: {
                nextEl: ".novidadesSwiper .swiper-button-next",
                prevEl: ".novidadesSwiper .swiper-button-prev",
            },
            pagination: {
                el: ".novidadesSwiper .swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1
                },
                640: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 5
                }
            }
        });

        var maisVendidosSwiper = new Swiper(".maisVendidosSwiper", {
            slidesPerView: 5,
            spaceBetween: 15,
            loop: true,
            navigation: {
                nextEl: ".maisVendidosSwiper .swiper-button-next",
                prevEl: ".maisVendidosSwiper .swiper-button-prev",
            },
            pagination: {
                el: ".maisVendidosSwiper .swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1
                },
                640: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 5
                }
            }
        });

        // Botão do WhatsApp
        const whatsappButtons = document.querySelectorAll('.btn-whatsapp');
        whatsappButtons.forEach(button => {
            button.addEventListener('click', function() {
                const phoneNumber = this.getAttribute('data-phone');
                const card = this.closest('.card-produto');
                const productName = card.querySelector('h3').textContent.trim();
                const productPrice = card.querySelector('.preco-novo').textContent.trim();

                const message =
                    `Olá, gostaria de comprar o produto:%0A%0A*Produto:* ${productName}%0A*Preço:* ${productPrice}%0A%0APoderia me ajudar?`;
                const whatsappUrl =
                    `https://api.whatsapp.com/send?phone=${phoneNumber}&text=${message}`;

                window.open(whatsappUrl, '_blank');
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const counters = [{
                id: "counter1",
                target: 20
            },
            {
                id: "counter2",
                target: 9500
            },
            {
                id: "counter3",
                target: 15
            }
        ];

        const options = {
            threshold: 0.5
        };

        const animateCount = (el, target) => {
            let current = 0;
            const increment = Math.ceil(target / 25);
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                el.textContent = current;
            }, 30);
        };

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counterConfig = counters.find(c => c.id === entry.target.id);
                    if (counterConfig) {
                        animateCount(entry.target, counterConfig.target);
                        obs.unobserve(entry.target);
                    }
                }
            });
        }, options);

        counters.forEach(c => {
            const el = document.getElementById(c.id);
            if (el) observer.observe(el);
        });
    });
</script>