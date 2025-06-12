<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medeiros Móveis - Produtos Premium</title>

    <!-- Bootstrap + AOS + FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="css/produtos.css">

</head>

<body>

    <!-- Products Section -->
    <section id="products" class="py-5">
        <div class="container">
            <h2 class="section-title" data-aos="fade-down">Nossas Categorias de Produtos</h2>

            <div class="category-tabs" data-aos="fade-up">
                <button class="btn-category active" onclick="showCategory('furniture')">
                    <i class="fas fa-couch me-2"></i>Móveis
                </button>
                <button class="btn-category" onclick="showCategory('electronics')">
                    <i class="fas fa-blender me-2"></i>Eletros
                </button>
                <button class="btn-category" onclick="showCategory('custom')">
                    <i class="fas fa-ruler-combined me-2"></i>Planejados
                </button>
                <button class="btn-category" onclick="showCategory('upholstery')">
                    <i class="fas fa-paint-roller me-2"></i>Estofados
                </button>
            </div>

            <div id="product-gallery" class="product-gallery" data-aos="fade-up" data-aos-delay="100">
                <!-- Furniture Products (Default) -->
                <div class="product-card furniture">
                    <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Sofá Premium" class="product-image">
                    <span class="product-badge">Novo</span>
                    <div class="product-info">
                        <h3 class="product-title">Sofá Premium 3 Lugares</h3>
                        <p class="product-description">Sofá em couro sintético de alta resistência, estrutura em madeira maciça e enchimento em espuma D33.</p>
                        <div class="product-price">R$ 2.499,00</div>
                        <div class="product-meta">
                            <span><i class="fas fa-ruler-combined me-1"></i> 2.10m x 0.90m</span>
                            <span><i class="fas fa-palette me-1"></i> 5 cores</span>
                        </div>
                    </div>
                    <button class="btn-details">Ver Detalhes</button>
                </div>

                <div class="product-card furniture">
                    <img src="https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Mesa de Jantar" class="product-image">
                    <div class="product-info">
                        <h3 class="product-title">Mesa de Jantar 6 Lugares</h3>
                        <p class="product-description">Mesa em madeira de demolição tratada, com tampo de 1.80m e base em metal pintado.</p>
                        <div class="product-price">R$ 1.899,00</div>
                        <div class="product-meta">
                            <span><i class="fas fa-ruler-combined me-1"></i> 1.80m x 0.90m</span>
                            <span><i class="fas fa-weight me-1"></i> 45kg</span>
                        </div>
                    </div>
                    <button class="btn-details">Ver Detalhes</button>
                </div>

                <!-- Electronics Products (Hidden by default) -->
                <div class="product-card electronics" style="display: none;">
                    <img src="https://images.unsplash.com/photo-1573555209210-e1f29e01fe8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Geladeira" class="product-image">
                    <span class="product-badge">Promoção</span>
                    <div class="product-info">
                        <h3 class="product-title">Geladeira Frost Free 420L</h3>
                        <p class="product-description">Geladeira duplex com freezer inferior, tecnologia inverter e classificação A++ em eficiência energética.</p>
                        <div class="product-price">R$ 3.299,00</div>
                        <div class="product-meta">
                            <span><i class="fas fa-bolt me-1"></i> 127V</span>
                            <span><i class="fas fa-box me-1"></i> 420L</span>
                        </div>
                    </div>
                    <button class="btn-details">Ver Detalhes</button>
                </div>

                <!-- Custom Products (Hidden by default) -->
                <div class="product-card custom" style="display: none;">
                    <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Cozinha Planejada" class="product-image">
                    <div class="product-info">
                        <h3 class="product-title">Cozinha Planejada Premium</h3>
                        <p class="product-description">Solução completa em MDF lacado, com ilha central, bancada em quartzito e eletrodomésticos embutidos.</p>
                        <div class="product-price">Sob Consulta</div>
                        <div class="product-meta">
                            <span><i class="fas fa-ruler me-1"></i> Personalizado</span>
                            <span><i class="fas fa-clock me-1"></i> 30 dias</span>
                        </div>
                    </div>
                    <button class="btn-details">Ver Detalhes</button>
                </div>

                <!-- Upholstery Products (Hidden by default) -->
                <div class="product-card upholstery" style="display: none;">
                    <img src="https://images.unsplash.com/photo-1598300042247-d088f8ab3a91?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Poltrona Reclinável" class="product-image">
                    <span class="product-badge">Mais Vendido</span>
                    <div class="product-info">
                        <h3 class="product-title">Poltrona Reclinável Premium</h3>
                        <p class="product-description">Poltrona em couro sintético com mecanismo de reclinação suave e apoio para copo integrado.</p>
                        <div class="product-price">R$ 1.299,00</div>
                        <div class="product-meta">
                            <span><i class="fas fa-weight me-1"></i> 28kg</span>
                            <span><i class="fas fa-palette me-1"></i> 8 cores</span>
                        </div>
                    </div>
                    <button class="btn-details">Ver Detalhes</button>
                </div>

                <!-- More products would be added here following the same pattern -->
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <!-- /* <section class="feature-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-down">Por que Escolher a Medeiros Móveis?</h2>
            <div class="row">
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h4>Entrega Rápida</h4>
                        <p>Entregamos em todo o Brasil em até 15 dias úteis</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Garantia Estendida</h4>
                        <p>3 anos de garantia em todos os nossos produtos</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h4>Parcele em 12x</h4>
                        <p>Parcele suas compras sem juros no cartão</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-couch"></i>
                        </div>
                        <h4>Showroom Exclusivo</h4>
                        <p>Visite nosso showroom e experimente antes de comprar</p>
                    </div>
                </div>
            </div>
        </div>
    </section>*/ -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        function showCategory(category) {
            // Update active button
            document.querySelectorAll('.btn-category').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');

            // Show/hide products
            document.querySelectorAll('.product-card').forEach(card => {
                if (card.classList.contains(category)) {
                    card.style.display = 'block';
                    card.setAttribute('data-aos', 'fade-up');
                } else {
                    card.style.display = 'none';
                }
            });

            // Refresh animations
            setTimeout(() => {
                AOS.refresh();
            }, 50);
        }
    </script>
</body>

</html>