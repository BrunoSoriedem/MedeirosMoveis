<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/sessao.php';

use App\Model\VerificaUsuario;
use App\Model\Produtos;
use App\Repository\ItensCarrinhoRepository;

$usuario = \App\Model\VerificaUsuario::usuarioLogado();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$produtos = Produtos::findAll();

$categorias = [
    'moveis' => [],
    'planejados' => [],
    'estofados' => [],
    'eletros' => []
];
$novidades = [];
$maisVendidos = [];

foreach ($produtos as $p) {
    if (strtolower($p->getMoveis()) === 'sim') {
        $categorias['moveis'][] = $p;
    }
    if (strtolower($p->getPlanejados()) === 'sim') {
        $categorias['planejados'][] = $p;
    }
    if (strtolower($p->getEstofados()) === 'sim') {
        $categorias['estofados'][] = $p;
    }
    if (strtolower($p->getEletros()) === 'sim') {
        $categorias['eletros'][] = $p;
    }
    if (strtolower($p->getNovidade()) === 'sim') {
        $novidades[] = $p;
    }
    if (strtolower($p->getMaisVendido()) === 'sim') {
        $maisVendidos[] = $p;
    }
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
                    <h1>Neste mês de <span class="destaque">Novembro</span></h1>
                    <p>A loja inteira está em promoção para a <span class="destaque">nossa Black Friday</span>!<br>
                        Aproveite descontos de até <span class="destaque">50%</span> em todos os
                        produtos.<br><br>
                        É o momento perfeito para planejar toda sua casa.<br>
                        Não perca! Esperamos por você com ofertas imperdíveis!
                    </p>
                </div>
            </div>
            <div class="swiper-slide slide-com-overlay" id="slide3">
                <img src="imagens/planejados/cozinha-clara-e-geladeira.jpg" alt="Mesas">
                <div class="conteudo-sobreposto">
                    <h1><span class="destaque">20 anos</span> de tradição e qualidade em móveis.</h1>
                    <p>Duas décadas transformando lares com dedicação, bom gosto e compromisso.<br>
                        Aqui, cada móvel conta uma história — a sua.</p>
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
                    <p>Acompanhe nossas novidades, promoções e projetos exclusivos.<br>
                        Siga-nos e fique por dentro de tudo que acontece por aqui!</p>
                    <div class="redes-sociais">
                        <a href="https://www.instagram.com/medeirosmoveisjuranda/" target="_blank" class="botao-rede"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://www.facebook.com/medeirosmoveis.juranda" target="_blank" class="botao-rede"><i
                                class="fab fa-facebook"></i></a>
                        <a href="https://wa.me/554499870212?text=Olá,%20vi%20vocês%20nas%20redes%20sociais!"
                            target="_blank" class="botao-rede"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
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
                    <img src="<?= htmlspecialchars($produtosCat[0]->getDiretorioImagem()) ?>"
                        alt="<?= htmlspecialchars($produtosCat[0]->getDescricao()) ?>" class="product-img">
                    <div class="product-info">
                        <h2 class="text text-center"><?= ucfirst($cat) ?></h2>
                        <a href="produto?categoria=<?= urlencode($cat) ?>" class="btn">Saiba Mais</a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="section-produtos-novidades">
    <h2 class="text text-center">Conheça as Novidades</h2>
    <div class="swiper novidadesSwiper">
        <div class="swiper-wrapper">
            <?php foreach ($novidades as $item): ?>
                <div class="swiper-slide slideInUp">
                    <div class="card-produto" data-id="<?= $item->getId() ?>">
                        <img src="<?= htmlspecialchars($item->getDiretorioImagem()) ?>"
                            alt="<?= htmlspecialchars($item->getDescricao()) ?>">
                        <div class="tags"><span class="tag novidade">Novidade</span></div>
                        <h3><?= htmlspecialchars($item->getDescricao()) ?></h3>
                        <div class="avaliacao">★★★★★</div>
                        <p class="preco-novo">R$ <?= number_format($item->getPrecoAV(), 2, ',', '.') ?></p>
                        <p class="preco-info">R$ <?= number_format($item->getPrecoAP(), 2, ',', '.') ?></p>
                        <p class="qtdeDisp">Estoque: <?= htmlspecialchars($item->getqtdeDisp()) ?></p>
                        <button class="btn-whatsapp" data-phone="5544999870212">
                            <i class="fa-brands fa-whatsapp"></i> Comprar no WhatsApp
                        </button>
                        <button class="btn-carrinho">
                            <i class="fa-solid fa-cart-shopping"></i> Adicionar ao Carrinho
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>

    <h2 class="text text-center">Os Mais Vendidos</h2>
    <div class="swiper maisVendidosSwiper">
        <div class="swiper-wrapper">
            <?php foreach ($maisVendidos as $item): ?>
                <div class="swiper-slide slideInUp">
                    <div class="card-produto" data-id="<?= $item->getId() ?>">
                        <img src="<?= htmlspecialchars($item->getDiretorioImagem()) ?>"
                            alt="<?= htmlspecialchars($item->getDescricao()) ?>">
                        <h3><?= htmlspecialchars($item->getDescricao()) ?></h3>
                        <div class="avaliacao">★★★★★</div>
                        <p class="preco-novo">R$ <?= number_format($item->getPrecoAV(), 2, ',', '.') ?></p>
                        <p class="preco-info">R$ <?= number_format($item->getPrecoAP(), 2, ',', '.') ?></p>
                        <p class="qtdeDisp">Estoque: <?= htmlspecialchars($item->getqtdeDisp()) ?></p>
                        <button class="btn-whatsapp" data-phone="5544999870212">
                            <i class="fa-brands fa-whatsapp"></i> Comprar no WhatsApp
                        </button>
                        <button class="btn-carrinho">
                            <i class="fa-solid fa-cart-shopping"></i> Adicionar ao Carrinho
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
                    <p class="testimonial-quote">"Gostei bastante! Atendimento ótimo e muita variedade de
                        produtos
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
                    <p class="testimonial-quote">"A loja tem várias opções de móveis e eletros, tudo muito
                        bonito e
                        do
                        jeitinho que eu precisava."</p>
                    <div class="testimonial-author">
                        <img src="imagens/avatar7.jpg" alt="Cliente" class="avatar" />
                        <div>
                            <h3>Ana Paula</h3>
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
                            Para escolher o móvel ideal, primeiro <span class="highlight">meça seu espaço</span>
                            com
                            precisão. Considere a funcionalidade desejada, o estilo da decoração existente e o
                            orçamento
                            disponível. Lembre-se de deixar espaço para circulação e verifique se as portas e
                            gavetas
                            têm abertura livre. O móvel deve ser proporcional ao ambiente, nem muito grande nem
                            muito
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
                            <span class="highlight">MDF</span> é feito de fibras de madeira prensadas,
                            oferecendo
                            acabamento liso e uniforme. <span class="highlight">MDP</span> utiliza partículas de
                            madeira, sendo mais econômico mas menos resistente à umidade. <span
                                class="highlight">Madeira maciça</span> é natural, mais durável e nobre, porém
                            com
                            custo
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
                            agressivos, proteja da luz solar direta e umidade excessiva. Use cera específica
                            para
                            madeira mensalmente, coloque protetores sob objetos que possam riscar e faça
                            manutenção
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
                            aproveitamento máximo do espaço e acabamento exclusivo, mas têm custo e prazo
                            maiores.
                            <span class="highlight">Móveis prontos</span> são mais econômicos, entrega imediata
                            e
                            facilidade de troca, porém com limitações de tamanho e personalização. A escolha
                            depende
                            do
                            orçamento, prazo e necessidades específicas do projeto.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.btn-carrinho').forEach(btn => {
            btn.addEventListener('click', async () => {
                const card = btn.closest('.card-produto');
                const id = card.getAttribute('data-id');

                btn.disabled = true;
                btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Adicionando...';

                try {
                    const response = await fetch(
                        'src/Controller/carrinho.php?action=adicionar', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `id=${encodeURIComponent(id)}`,
                            credentials: 'include'
                        });

                    const data = await response.json();

                    if (data.sucesso) {
                        const estoqueElemento = card.querySelector('.qtdeDisp');
                        // if (estoqueElemento) {
                        //     const numero = estoqueElemento.textContent.replace(/\D/g, '');
                        //     let estoqueAtual = parseInt(numero, 10);
                        //     if (!isNaN(estoqueAtual) && estoqueAtual > 0) {
                        //         estoqueAtual--;
                        //         estoqueElemento.textContent = `Estoque: ${estoqueAtual}`;
                        //     }
                        // }

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Produto adicionado ao carrinho!',
                            text: 'Você pode continuar comprando ou acessar seu carrinho.',
                            showConfirmButton: false,
                            timer: 1500,
                            backdrop: false
                        });
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Aviso',
                            text: data.erro || 'Erro ao adicionar o produto.'
                        });
                    }
                } catch (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        text: 'Falha na requisição.'
                    });
                } finally {
                    btn.disabled = false;
                    btn.innerHTML =
                        '<i class="fa-solid fa-cart-shopping"></i> Adicionar ao Carrinho';
                }
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


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const produtosLink = document.querySelector('.nav-item.dropdown .dropdown-toggle');
        if (!produtosLink) return;

        if (typeof bootstrap !== 'undefined' && bootstrap.Dropdown) {
            const bsInstance = bootstrap.Dropdown.getOrCreateInstance(produtosLink);

            produtosLink.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                bsInstance.toggle();
            });

            document.addEventListener('click', function(evt) {
                if (!produtosLink.closest('.nav-item.dropdown').contains(evt.target)) {
                    const inst = bootstrap.Dropdown.getInstance(produtosLink);
                    if (inst) inst.hide();
                }
            });

            const itens = document.querySelectorAll('.nav-item.dropdown .dropdown-menu .dropdown-item');
            itens.forEach(i => i.addEventListener('click', e => e.stopPropagation()));
        } else {
            const dropdownMenu = produtosLink.nextElementSibling;
            produtosLink.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                dropdownMenu.classList.toggle('show');
            });
            document.addEventListener('click', function(evt) {
                if (!produtosLink.closest('.nav-item.dropdown').contains(evt.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        }
    });
</script>