<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<link rel="stylesheet" href="css/produtos.css">

<section id="products" class="py-5">
    <div class="container">
        <h2>Nossas Categorias de Produtos</h2>

        <div class="category-buttons">
            <button class="category-btn active" data-category="moveis">Móveis</button>
            <button class="category-btn" data-category="planejados">Planejados</button>
            <button class="category-btn" data-category="estofados">Estofados</button>
            <button class="category-btn" data-category="eletros">Eletros</button>
        </div>

        <div class="products-grid" id="products-grid">
            <!-- MÓVEIS --><?php
                            foreach ($moveis as $item) {
                                // Determina a categoria principal
                                if ($item["moveis"] === "Sim") $categoria = "moveis";
                                elseif ($item["planejados"] === "Sim") $categoria = "planejados";
                                elseif ($item["estofados"] === "Sim") $categoria = "estofados";
                                elseif ($item["eletros"] === "Sim") $categoria = "eletros";
                                else $categoria = "outros";
                            ?>
                <div class="card-produto" data-category="<?= $categoria ?>">
                    <img src="<?= $item["foto"] ?>" alt="<?= htmlspecialchars($item["nome"]) ?>">
                    <div class="tags">
                        <?php if ($item["novidade"] === "Sim"): ?>
                            <span class="tag novidade">Novidade</span>
                        <?php endif; ?>
                        <?php if ($item["maisVendido"] === "Sim"): ?>
                            <span class="tag destaque">Mais Vendido</span>
                        <?php endif; ?>
                    </div>
                    <h3><?= htmlspecialchars($item["nome"]) ?></h3>
                    <div class="avaliacao">★★★★★</div>
                    <p class="preco-antigo"><?= $item["valorAnt"] ?></p>
                    <p class="preco-novo"><?= $item["valorAV"] ?></p>
                    <p class="preco-info"><?= $item["valorAP"] ?></p>
                    <button class="btn-whatsapp">
                        <i class="fa-brands fa-whatsapp"></i>
                        Comprar no WhatsApp
                    </button>
                </div>
            <?php
                            }
            ?>


            <!-- PLANEJADOS
            <div class="card-produto" data-category="planejados">
                <span class="desconto">-30%</span>
                <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Cozinha Planejada">
                <div class="tags">
                    <span class="tag exclusivo">Exclusivo</span>
                </div>
                <h3>Cozinha Planejada Completa</h3>
                <div class="avaliacao">★★★★★</div>
                <p class="preco-antigo">R$ 12.999,00</p>
                <p class="preco-novo">R$ 8.999,00</p>
                <p class="preco-info">24x de R$ 374,96 sem juros</p>
                <button class="btn-whatsapp">
                    <i class="fa-brands fa-whatsapp"></i>
                    Comprar no WhatsApp
                </button>
            </div>

            <div class="card-produto" data-category="planejados">
                <span class="desconto">-20%</span>
                <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Estante Planejada">
                <div class="tags">
                </div>
                <h3>Estante Planejada para Sala</h3>
                <div class="avaliacao">★★★★★</div>
                <p class="preco-antigo">R$ 3.199,00</p>
                <p class="preco-novo">R$ 2.559,00</p>
                <p class="preco-info">18x de R$ 142,17 sem juros</p>
                <button class="btn-whatsapp">
                    <i class="fa-brands fa-whatsapp"></i>
                    Comprar no WhatsApp
                </button>
            </div>

            <div class="card-produto" data-category="planejados">
                <span class="desconto">-15%</span>
                <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Quarto Planejado">
                <div class="tags">
                </div>
                <h3>Quarto Planejado Casal</h3>
                <div class="avaliacao">★★★★★</div>
                <p class="preco-antigo">R$ 7.999,00</p>
                <p class="preco-novo">R$ 6.799,00</p>
                <p class="preco-info">24x de R$ 283,29 sem juros</p>
                <button class="btn-whatsapp">
                    <i class="fa-brands fa-whatsapp"></i>
                    Comprar no WhatsApp
                </button>
            </div>

            <div class="card-produto" data-category="estofados">
                <span class="desconto">-25%</span>
                <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Sofá Retrátil">
                <div class="tags">
                </div>
                <h3>Sofá Retrátil 3 Lugares</h3>
                <div class="avaliacao">★★★★★</div>
                <p class="preco-antigo">R$ 2.500,00</p>
                <p class="preco-novo">R$ 1.875,00</p>
                <p class="preco-info">12x de R$ 156,25 sem juros</p>
                <button class="btn-whatsapp">
                    <i class="fa-brands fa-whatsapp"></i>
                    Comprar no WhatsApp
                </button>
            </div>

            <div class="card-produto" data-category="estofados">
                <span class="desconto">-18%</span>
                <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Poltrona Reclinável">
                <div class="tags">
                </div>
                <h3>Poltrona Reclinável</h3>
                <div class="avaliacao">★★★★★</div>
                <p class="preco-antigo">R$ 999,00</p>
                <p class="preco-novo">R$ 819,00</p>
                <p class="preco-info">10x de R$ 81,90 sem juros</p>
                <button class="btn-whatsapp">
                    <i class="fa-brands fa-whatsapp"></i>
                    Comprar no WhatsApp
                </button>
            </div>

            <div class="card-produto" data-category="estofados">
                <span class="desconto">-12%</span>
                <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Puff Decorativo">
                <div class="tags">
                </div>
                <h3>Puff Baú Decorativo</h3>
                <div class="avaliacao">★★★★★</div>
                <p class="preco-antigo">R$ 250,00</p>
                <p class="preco-novo">R$ 220,00</p>
                <p class="preco-info">6x de R$ 36,67 sem juros</p>
                <button class="btn-whatsapp">
                    <i class="fa-brands fa-whatsapp"></i>
                    Comprar no WhatsApp
                </button>
            </div>

            <div class="card-produto" data-category="eletros">
                <span class="desconto">-35%</span>
                <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Geladeira Duplex">
                <div class="tags">
                </div>
                <h3>Geladeira Duplex 450L</h3>
                <div class="avaliacao">★★★★★</div>
                <p class="preco-antigo">R$ 3.500,00</p>
                <p class="preco-novo">R$ 2.275,00</p>
                <p class="preco-info">18x de R$ 126,39 sem juros</p>
                <button class="btn-whatsapp">
                    <i class="fa-brands fa-whatsapp"></i>
                    Comprar no WhatsApp
                </button>
            </div>

            <div class="card-produto" data-category="eletros">
                <span class="desconto">-28%</span>
                <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Smart TV">
                <div class="tags">
                </div>
                <h3>Smart TV 65" 4K</h3>
                <div class="avaliacao">★★★★★</div>
                <p class="preco-antigo">R$ 3.000,00</p>
                <p class="preco-novo">R$ 2.160,00</p>
                <p class="preco-info">15x de R$ 144,00 sem juros</p>
                <button class="btn-whatsapp">
                    <i class="fa-brands fa-whatsapp"></i>
                    Comprar no WhatsApp
                </button>
            </div>

            <div class="card-produto" data-category="eletros">
                <span class="desconto">-22%</span>
                <img src="imagens/moveis/g.r 6 portas clara.jpg" alt="Fogão 5 Bocas">
                <div class="tags">
                </div>
                <h3>Fogão 5 Bocas</h3>
                <div class="avaliacao">★★★★★</div>
                <p class="preco-antigo">R$ 1.200,00</p>
                <p class="preco-novo">R$ 936,00</p>
                <p class="preco-info">12x de R$ 78,00 sem juros</p>
                <button class="btn-whatsapp">
                    <i class="fa-brands fa-whatsapp"></i>
                    Comprar no WhatsApp
                </button>
            </div> -->
        </div>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const itemsPerPage = 15;
        let currentPage = 1;
        let currentCategory = "moveis"; // Categoria padrão ao carregar

        const products = Array.from(document.querySelectorAll(".card-produto"));
        const paginationContainer = document.createElement("div");
        paginationContainer.id = "pagination";
        document.getElementById("products-grid").after(paginationContainer);

        const buttons = document.querySelectorAll('.category-btn');

        function filterAndPaginate() {
            const filteredProducts = products.filter(product => product.dataset.category === currentCategory);

            const totalPages = Math.ceil(filteredProducts.length / itemsPerPage);
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;

            // Oculta todos
            products.forEach(product => {
                product.style.display = 'none';
            });

            // Mostra apenas os produtos filtrados e paginados
            filteredProducts.forEach((product, index) => {
                if (index >= start && index < end) {
                    product.style.display = 'block';
                }
            });

            // Atualiza a paginação
            updatePagination(totalPages);
        }

        function updatePagination(totalPages) {
            paginationContainer.innerHTML = "";

            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement("button");
                btn.textContent = i;
                btn.classList.add("btn", "btn-sm", "mx-1");
                if (i === currentPage) btn.classList.add("btn-primary");
                else btn.classList.add("btn-outline-primary");

                btn.addEventListener("click", () => {
                    currentPage = i;
                    filterAndPaginate();
                });

                paginationContainer.appendChild(btn);
            }
        }

        buttons.forEach(btn => {
            btn.addEventListener("click", () => {
                currentCategory = btn.getAttribute("data-category");
                currentPage = 1;

                // Ativa botão atual
                buttons.forEach(b => b.classList.remove("active"));
                btn.classList.add("active");

                filterAndPaginate();
            });
        });

        // Inicializa
        filterAndPaginate();
    });
</script>
<script>
    function filterProducts(category) {
        const products = document.querySelectorAll('.card-produto');
        const buttons = document.querySelectorAll('.category-btn');

        // Remove classe ativa de todos os botões
        buttons.forEach(btn => btn.classList.remove('active'));

        // Adiciona classe ativa ao botão clicado
        document.querySelector(`[data-category="${category}"]`).classList.add('active');

        // Esconde todos os produtos primeiro
        products.forEach(product => {
            product.style.display = 'none';
        });

        // Mostra apenas os produtos da categoria selecionada
        products.forEach(product => {
            if (product.dataset.category === category) {
                product.style.display = 'block';
            }
        });
    }

    // Adiciona event listeners aos botões
    document.querySelectorAll('.category-btn').forEach(button => {
        button.addEventListener('click', () => {
            const category = button.getAttribute('data-category');
            filterProducts(category);
        });
    });

    // Inicializa a página mostrando apenas móveis
    document.addEventListener('DOMContentLoaded', () => {
        filterProducts('moveis');
    });
</script>