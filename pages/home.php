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
                <img src="imagens/planejados/cozinha clara e geladeira.jpg" alt="Colchão Gazin">
                <div class="conteudo-sobreposto-direito">
                    <h1>Neste mês de <span class="destaque">Junho</span></h1>
                    <p>
                        A loja inteira está em clima de <span class="destaque">Festa Junina</span>! <br>
                        Aproveite descontos de até <span class="destaque">50%</span> em todos os produtos. <br><br>
                        É o momento perfeito para renovar sua casa com qualidade e economia. <br>
                        Não perca! Esperamos por você com ofertas imperdíveis!
                    </p>

                </div>
            </div>
            <div class="swiper-slide slide-com-overlay" id="slide3">
                <img src="imagens/eletros/geladeira 3 portas.jpg" alt="Mesas">
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
                <img src="imagens/estofados/Sofa Preto 8p.jpg" alt="Mesas">
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

<section class="featured" id="featured">
    <div class="section-title">
        <h2 class="text text-center fade-up">Nossos Destaques</h2>
    </div>
    <div class="products-grid">
        <?php
        foreach ($nomeClasseProd as $item): ?>
            <div class="product-card fade-up">
                <span class="tag"></span>
                <img src="<?= $item["imagem"] ?>" alt="<?= htmlspecialchars($item["nome"]) ?>" class="product-img">
                <div class="product-info">
                    <h2 class="text text-center" id="h2p"><?= htmlspecialchars($item["nome"]) ?></h2>
                    <span class="price"></span>
                    <a href="<?= $item["href"] ?>" class="btn">Saiba Mais</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="categories">
    <div class="section-title">
        <h2 class="text text-center" id="espaco-categoria">Nossas Categorias</h2>
    </div>
    <div class="categories-grid">
        <div class="category-card">
            <img src="imagens/Moveis/cristaleira alta linz.jpg" alt="Sala de Estar" class="category-img">
            <div class="category-overlay">
                <h3>Sala de Estar</h3>
                <a href="#" class="btn-colecao">Ver Coleção <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="category-card">
            <img src="imagens/Moveis/cristaleira alta linz.jpg" alt="Quarto" class="category-img">
            <div class="category-overlay">
                <h3>Quarto</h3>
                <a href="#" class="btn-colecao">Ver Coleção <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="category-card">
            <img src="imagens/Moveis/cristaleira alta linz.jpg" alt="Quarto" class="category-img">
            <div class="category-overlay">
                <h3>Quarto</h3>
                <a href="#" class="btn-colecao">Ver Coleção <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="category-card">
            <img src="imagens/Moveis/cristaleira alta linz.jpg" alt="Quarto" class="category-img">
            <div class="category-overlay">
                <h3>Quarto</h3>
                <a href="#" class="btn-colecao">Ver Coleção <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="category-card">
            <img src="imagens/Moveis/cristaleira alta linz.jpg" alt="Quarto" class="category-img">
            <div class="category-overlay">
                <h3>Quarto</h3>
                <a href="#" class="btn-colecao">Ver Coleção <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="category-card">
            <img src="imagens/Moveis/cristaleira alta linz.jpg" alt="Quarto" class="category-img">
            <div class="category-overlay">
                <h3>Quarto</h3>
                <a href="#" class="btn-colecao">Ver Coleção <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>


        <div class="category-card">
            <img src="imagens/Moveis/cristaleira alta linz.jpg" alt="Cozinha" class="category-img">
            <div class="category-overlay">
                <h3>Cozinha</h3>
                <a href="#" class="btn-colecao">Ver Coleção <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="category-card">
            <img src="imagens/Moveis/cristaleira alta linz.jpg" alt="Escritório" class="category-img">
            <div class="category-overlay">
                <h3>Escritório</h3>
                <a href="#" class="btn-colecao">Ver Coleção <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="section-produtos-novidades">
    <h2 class="text text-center">Conheça as novidades</h2>

    <div class="swiper produtosSwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide slideInUp">
                <div class="card-produto">
                    <span class="desconto">-1%</span>,
                    <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Cadeira Padova com Braços">
                    <div class="tags">
                        <span class="tag novidade">Novidade</span>
                    </div>
                    <h3>Cadeira Padova com Braços</h3>
                    <div class="avaliacao">★★★★★</div>
                    <p class="preco-antigo">R$ 1.417,00</p>
                    <p class="preco-novo">R$ 1.394,00</p>
                    <p class="preco-info">10x de R$ 139,40 sem juros</p>
                    <button class="btn-verde">Ver produto</button>
                    <button class="btn-whatsapp">💬 Comprar no WhatsApp</button>
                </div>
            </div>


            <div class="swiper-slide">
                <div class="card-produto">
                    <span class="desconto">-1%</span>
                    <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Cadeira Padova com Braços">
                    <div class="tags">
                        <span class="tag novidade">Novidade</span>
                    </div>
                    <h3>Cadeira Padova com Braços</h3>
                    <div class="avaliacao">★★★★★</div>
                    <p class="preco-antigo">R$ 1.417,00</p>
                    <p class="preco-novo">R$ 1.394,00</p>
                    <p class="preco-info">10x de R$ 139,40 sem juros</p>
                    <button class="btn-verde">Ver produto</button>
                    <button class="btn-whatsapp">💬 Comprar no WhatsApp</button>
                </div>
            </div>






            <div class="swiper-slide">
                <div class="card-produto" id="card-novidades">
                    <span class="desconto">-1%</span>
                    <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Cadeira Padova com Braços">
                    <div class="tags">
                        <span class="tag novidade">Novidade</span>
                    </div>
                    <h3>Cadeira Padova com Braços</h3>
                    <div class="avaliacao">★★★★★</div>
                    <p class="preco-antigo">R$ 1.417,00</p>
                    <p class="preco-novo">R$ 1.394,00</p>
                    <p class="preco-info">10x de R$ 139,40 sem juros</p>
                    <button class="btn-verde">Ver produto</button>
                    <button class="btn-whatsapp">
                        <i class="fa-brands fa-whatsapp">
                        </i>
                        Comprar no WhatsApp

                    </button>
                </div>
            </div>









            <div class="swiper-slide">
                <div class="card-produto">
                    <span class="desconto">-1%</span>
                    <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Cadeira Padova com Braços">
                    <div class="tags">
                        <span class="tag novidade">Novidade</span>
                    </div>
                    <h3>Cadeira Padova com Braços</h3>
                    <div class="avaliacao">★★★★★</div>
                    <p class="preco-antigo">R$ 1.417,00</p>
                    <p class="preco-novo">R$ 1.394,00</p>
                    <p class="preco-info">10x de R$ 139,40 sem juros</p>
                    <button class="btn-verde">Ver produto</button>
                    <button class="btn-whatsapp">💬 Comprar no WhatsApp</button>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card-produto">
                    <span class="desconto">-1%</span>
                    <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Cadeira Padova com Braços">
                    <div class="tags">
                        <span class="tag novidade">Novidade</span>
                    </div>
                    <h3>Cadeira Padova com Braços</h3>
                    <div class="avaliacao">★★★★★</div>
                    <p class="preco-antigo">R$ 1.417,00</p>
                    <p class="preco-novo">R$ 1.394,00</p>
                    <p class="preco-info">10x de R$ 139,40 sem juros</p>
                    <button class="btn-verde">Ver produto</button>
                    <button class="btn-whatsapp">💬 Comprar no WhatsApp</button>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card-produto">
                    <span class="desconto">-1%</span>
                    <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Cadeira Padova com Braços">
                    <div class="tags">
                        <span class="tag novidade">Novidade</span>
                    </div>
                    <h3>Cadeira Padova com Braços</h3>
                    <div class="avaliacao">★★★★★</div>
                    <p class="preco-antigo">R$ 1.417,00</p>
                    <p class="preco-novo">R$ 1.394,00</p>
                    <p class="preco-info">10x de R$ 139,40 sem juros</p>
                    <button class="btn-verde">Ver produto</button>
                    <button class="btn-whatsapp">💬 Comprar no WhatsApp</button>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card-produto">
                    <span class="desconto">-1%</span>
                    <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Cadeira Padova com Braços">
                    <div class="tags">
                        <span class="tag novidade">Novidade</span>
                    </div>
                    <h3>Cadeira Padova com Braços</h3>
                    <div class="avaliacao">★★★★★</div>
                    <p class="preco-antigo">R$ 1.417,00</p>
                    <p class="preco-novo">R$ 1.394,00</p>
                    <p class="preco-info">10x de R$ 139,40 sem juros</p>
                    <button class="btn-verde">Ver produto</button>
                    <button class="btn-whatsapp">💬 Comprar no WhatsApp</button>
                </div>
            </div>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>


    <h2 class="text text-center" id="escrita-vendidos">Os mais Vendidos</h2>

    <div class="swiper produtosSwiper">
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="card-produto reveal">
                    <span class="desconto">-1%</span>
                    <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Cadeira Padova com Braços">
                    <div class="tags">
                        <span class="tag novidade">Destaque</span>
                    </div>
                    <h3>Cadeira Padova com Braços</h3>
                    <div class="avaliacao">★★★★★</div>
                    <p class="preco-antigo">R$ 1.417,00</p>
                    <p class="preco-novo">R$ 1.394,00</p>
                    <p class="preco-info">10x de R$ 139,40 sem juros</p>
                    <button class="btn-verde">Ver produto</button>
                    <button class="btn-whatsapp">💬 Comprar no WhatsApp</button>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card-produto reveal">
                    <span class="desconto">-1%</span>
                    <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Cadeira Padova com Braços">
                    <div class="tags">
                        <span class="tag novidade">Novidade</span>
                    </div>
                    <h3>Cadeira Padova com Braços</h3>
                    <div class="avaliacao">★★★★★</div>
                    <p class="preco-antigo">R$ 1.417,00</p>
                    <p class="preco-novo">R$ 1.394,00</p>
                    <p class="preco-info">10x de R$ 139,40 sem juros</p>
                    <button class="btn-verde">Ver produto</button>
                    <button class="btn-whatsapp">💬 Comprar no WhatsApp</button>
                </div>
            </div>





            <div class="swiper-slide">
                <div class="card-produto" id="card-vendidos">
                    <span class="desconto">-20%</span>
                    <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Cadeira Padova com Braços">
                    <div class="tags">
                        <span class="tag novidade">Destaque</span>
                    </div>
                    <h3>Cadeira Padova com Braços</h3>
                    <div class="avaliacao">★★★★★</div>
                    <p class="preco-antigo">R$ 1.417,00</p>
                    <p class="preco-novo">R$ 1.394,00</p>
                    <p class="preco-info">10x de R$ 139,40 sem juros</p>
                    <button class="btn-verde">Ver produto</button>
                    <button class="btn-whatsapp">
                        <i class="fa-brands fa-whatsapp">
                        </i>
                        Comprar no WhatsApp
                    </button>
                </div>
            </div>







            <div class="swiper-slide">
                <div class="card-produto">
                    <span class="desconto">-1%</span>
                    <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Cadeira Padova com Braços">
                    <div class="tags">
                        <span class="tag novidade">Novidade</span>
                    </div>
                    <h3>Cadeira Padova com Braços</h3>
                    <div class="avaliacao">★★★★★</div>
                    <p class="preco-antigo">R$ 1.417,00</p>
                    <p class="preco-novo">R$ 1.394,00</p>
                    <p class="preco-info">10x de R$ 139,40 sem juros</p>
                    <button class="btn-verde">Ver produto</button>
                    <button class="btn-whatsapp">💬 Comprar no WhatsApp</button>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card-produto">
                    <span class="desconto">-1%</span>
                    <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Cadeira Padova com Braços">
                    <div class="tags">
                        <span class="tag novidade">Novidade</span>
                    </div>
                    <h3>Cadeira Padova com Braços</h3>
                    <div class="avaliacao">★★★★★</div>
                    <p class="preco-antigo">R$ 1.417,00</p>
                    <p class="preco-novo">R$ 1.394,00</p>
                    <p class="preco-info">10x de R$ 139,40 sem juros</p>
                    <button class="btn-verde">Ver produto</button>
                    <button class="btn-whatsapp">💬 Comprar no WhatsApp</button>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card-produto">
                    <span class="desconto">-1%</span>
                    <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Cadeira Padova com Braços">
                    <div class="tags">
                        <span class="tag novidade">Novidade</span>
                    </div>
                    <h3>Cadeira Padova com Braços</h3>
                    <div class="avaliacao">★★★★★</div>
                    <p class="preco-antigo">R$ 1.417,00</p>
                    <p class="preco-novo">R$ 1.394,00</p>
                    <p class="preco-info">10x de R$ 139,40 sem juros</p>
                    <button class="btn-verde">Ver produto</button>
                    <button class="btn-whatsapp">💬 Comprar no WhatsApp</button>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card-produto">
                    <span class="desconto">-1%</span>
                    <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Cadeira Padova com Braços">
                    <div class="tags">
                        <span class="tag novidade">Novidade</span>
                    </div>
                    <h3>Cadeira Padova com Braços</h3>
                    <div class="avaliacao">★★★★★</div>
                    <p class="preco-antigo">R$ 1.417,00</p>
                    <p class="preco-novo">R$ 1.394,00</p>
                    <p class="preco-info">10x de R$ 139,40 sem juros</p>
                    <button class="btn-verde">Ver produto</button>
                    <button class="btn-whatsapp">💬 Comprar no WhatsApp</button>
                </div>
            </div>



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
            Quer saber o que torna a nossa marca tão especial? Confira o que nossos clientes
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
                    <p class="testimonial-quote">"Loja com boas opções em móveis
                        sob medida para atender melhor o cliente.
                        Bom atendimento e variedade."</p>
                    <div class="testimonial-author">
                        <img src="imagens/avatar1.jpg" alt="Cliente" class="avatar" />
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
                    <p class="testimonial-quote">"Loja com boas opções em móveis
                        sob medida para atender melhor o cliente.
                        Bom atendimento e variedade."</p>
                    <div class="testimonial-author">
                        <img src="imagens/avatar2.jpg" alt="Cliente" class="avatar" />
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
                    <p class="testimonial-quote">"Loja com boas opções em móveis
                        sob medida para atender melhor o cliente.
                        Bom atendimento e variedade."</p>
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
                    <p class="testimonial-quote">"Excelente custo-benefício e atendimento
                        humanizado. <br> Muito top"
                        humanizado. Muito top"</p>
                    <div class="testimonial-author">
                        <img src="imagens/avatar1.jpg" alt="Cliente" class="avatar" />
                        <div>
                            <h3>Mariana Lopes</h3>
                            <p>Cliente desde 2022</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navegação -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Função para animar os elementos
        function animateElements() {
            const elements = document.querySelectorAll('.fade-up');
            const windowHeight = window.innerHeight;

            elements.forEach((element, index) => {
                // Aplica delay progressivo baseado no índice
                element.style.transitionDelay = `${index * 0.1}s`;

                const elementPosition = element.getBoundingClientRect().top;
                const elementVisible = 150; // Quantos pixels do elemento precisam estar visíveis

                if (elementPosition < windowHeight - elementVisible) {
                    element.classList.add('active');
                }
            });
        }

        // Executa quando a página carrega
        animateElements();

        // Executa quando o usuário faz scroll
        window.addEventListener('scroll', animateElements);
    });
</script>
<!-- function resetAnimation() {
const card = document.getElementById('product-card');
card.classList.remove('exit');
card.style.animation = 'none';

// Força o reflow
card.offsetHeight;

// Reaplica a animação
card.style.animation = 'slideInUp 0.8s ease-out';

// Reaplica animações dos elementos filhos
const elements = card.querySelectorAll('*');
elements.forEach((el, index) => {
el.style.animation = 'none';
el.offsetHeight;

// Reaplica animações específicas baseadas no elemento
if (el.classList.contains('desconto')) {
el.style.animation = 'bounceIn 0.6s ease-out 0.4s both';
} else if (el.tagName === 'IMG') {
el.style.animation = 'fadeInScale 0.8s ease-out 0.2s both';
} else if (el.classList.contains('tags')) {
el.style.animation = 'slideInLeft 0.6s ease-out 0.3s both';
} else if (el.tagName === 'H3') {
el.style.animation = 'slideInUp 0.6s ease-out 0.4s both';
} else if (el.classList.contains('avaliacao')) {
el.style.animation = 'slideInRight 0.6s ease-out 0.5s both';
} else if (el.classList.contains('preco-antigo')) {
el.style.animation = 'slideInLeft 0.6s ease-out 0.6s both';
} else if (el.classList.contains('preco-novo')) {
el.style.animation = 'fadeInScale 0.6s ease-out 0.7s both';
} else if (el.classList.contains('preco-info')) {
el.style.animation = 'slideInUp 0.6s ease-out 0.8s both';
} else if (el.classList.contains('btn-verde')) {
el.style.animation = 'slideInUp 0.6s ease-out 0.9s both';
} else if (el.classList.contains('btn-whatsapp')) {
el.style.animation = 'slideInUp 0.6s ease-out 1s both';
}
});
}

function triggerExit() {
const card = document.getElementById('product-card');
card.classList.add('exit');

// Remove o card após a animação e o reinsere
setTimeout(() => {
card.style.display = 'none';
setTimeout(() => {
card.style.display = 'block';
resetAnimation();
}, 500);
}, 500);
}

// Adiciona efeitos sonoros visuais aos botões
document.querySelectorAll('.btn-verde, .btn-whatsapp').forEach(btn => {
btn.addEventListener('click', function(e) {
// Cria efeito ripple
const ripple = document.createElement('span');
const rect = this.getBoundingClientRect();
const size = Math.max(rect.width, rect.height);
const x = e.clientX - rect.left - size / 2;
const y = e.clientY - rect.top - size / 2;

ripple.style.width = ripple.style.height = size + 'px';
ripple.style.left = x + 'px';
ripple.style.top = y + 'px';
ripple.style.position = 'absolute';
ripple.style.borderRadius = '50%';
ripple.style.background = 'rgba(255,255,255,0.6)';
ripple.style.transform = 'scale(0)';
ripple.style.animation = 'ripple 0.6s linear';
ripple.style.pointerEvents = 'none';

this.appendChild(ripple);

setTimeout(() => {
ripple.remove();
}, 600);
});
});

// CSS para o efeito ripple
const style = document.createElement('style');
style.textContent = `
@keyframes ripple {
to {
transform: scale(4);
opacity: 0;
}
}
`;
document.head.appendChild(style);*/ -->