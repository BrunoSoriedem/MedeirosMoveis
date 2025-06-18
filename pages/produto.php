<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<link rel="stylesheet" href="css/produtos.css">

<style>
    .card-produto {
        display: none;
    }
</style>

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
            <?php
            foreach ($moveis as $item) {
                if ($item["moveis"] === "Sim") $categoria = "moveis";
                elseif ($item["planejados"] === "Sim") $categoria = "planejados";
                elseif ($item["estofados"] === "Sim") $categoria = "estofados";
                elseif ($item["eletros"] === "Sim") $categoria = "eletros";
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
        </div>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     const itemsPerPage = 15;
    //     let currentPage = 1;
    //     const urlParams = new URLSearchParams(window.location.search);
    //     let currentCategory = urlParams.get("categoria") || "moveis";

    //     const products = Array.from(document.querySelectorAll(".card-produto"));
    //     const paginationContainer = document.createElement("div");
    //     paginationContainer.id = "pagination";
    //     paginationContainer.classList.add("d-flex", "justify-content-center", "mt-4", "flex-wrap", "gap-2");
    //     document.getElementById("products-grid").after(paginationContainer);

    //     const buttons = document.querySelectorAll('.category-btn');

    //     function filterAndPaginate() {
    //         const filteredProducts = products.filter(product => product.dataset.category === currentCategory);

    //         const totalPages = Math.ceil(filteredProducts.length / itemsPerPage);
    //         const start = (currentPage - 1) * itemsPerPage;
    //         const end = start + itemsPerPage;

    //         products.forEach(product => {
    //             product.style.display = 'none';
    //         });

    //         filteredProducts.forEach((product, index) => {
    //             if (index >= start && index < end) {
    //                 product.style.display = 'block';
    //             }
    //         });

    //         updatePagination(totalPages);
    //     }

    //     function updatePagination(totalPages) {
    //         paginationContainer.innerHTML = "";

    //         for (let i = 1; i <= totalPages; i++) {
    //             const btn = document.createElement("button");
    //             btn.textContent = i;
    //             btn.classList.add("btn", "btn-md", "me-md-2");
    //             if (i === currentPage) btn.classList.add("btn-success");
    //             else btn.classList.add("btn-outline-success");

    //             btn.addEventListener("click", () => {
    //                 currentPage = i;
    //                 filterAndPaginate();
    //                 document.getElementById("products").scrollIntoView({
    //                     behavior: "smooth"
    //                 });
    //             });
    //             paginationContainer.appendChild(btn);
    //         }
    //     }

    //     buttons.forEach(btn => {
    //         btn.addEventListener("click", () => {
    //             currentCategory = btn.getAttribute("data-category");
    //             currentPage = 1;

    //             buttons.forEach(b => b.classList.remove("active"));
    //             btn.classList.add("active");

    //             filterAndPaginate();
    //         });
    //     });

    //     filterAndPaginate();
    // });
    document.addEventListener("DOMContentLoaded", function() {
        const itemsPerPage = 15;
        let currentPage = 1;
        const urlParams = new URLSearchParams(window.location.search);
        let currentCategory = urlParams.get("categoria") || "moveis";

        const products = Array.from(document.querySelectorAll(".card-produto"));
        const paginationContainer = document.createElement("div");
        paginationContainer.id = "pagination";
        paginationContainer.classList.add("d-flex", "justify-content-center", "mt-4", "flex-wrap", "gap-2");
        document.getElementById("products-grid").after(paginationContainer);

        const buttons = document.querySelectorAll('.category-btn');

        // Função para ativar o botão correto baseado na categoria atual
        function setActiveButton() {
            buttons.forEach(btn => {
                btn.classList.remove("active");
                if (btn.getAttribute("data-category") === currentCategory) {
                    btn.classList.add("active");
                }
            });
        }

        // Ativa o botão correto quando a página carrega
        setActiveButton();

        function filterAndPaginate() {
            const filteredProducts = products.filter(product => product.dataset.category === currentCategory);

            const totalPages = Math.ceil(filteredProducts.length / itemsPerPage);
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;

            products.forEach(product => {
                product.style.display = 'none';
            });

            filteredProducts.forEach((product, index) => {
                if (index >= start && index < end) {
                    product.style.display = 'block';
                }
            });

            updatePagination(totalPages);
        }

        function updatePagination(totalPages) {
            paginationContainer.innerHTML = "";

            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement("button");
                btn.textContent = i;
                btn.classList.add("btn", "btn-md", "me-md-2");
                if (i === currentPage) btn.classList.add("btn-success");
                else btn.classList.add("btn-outline-success");

                btn.addEventListener("click", () => {
                    currentPage = i;
                    filterAndPaginate();
                    document.getElementById("products").scrollIntoView({
                        behavior: "smooth"
                    });
                });
                paginationContainer.appendChild(btn);
            }
        }

        buttons.forEach(btn => {
            btn.addEventListener("click", () => {
                currentCategory = btn.getAttribute("data-category");
                currentPage = 1;

                // Atualiza a URL sem recarregar a página
                history.pushState(null, null, `?categoria=${currentCategory}`);

                // Ativa o botão correto
                setActiveButton();

                filterAndPaginate();
            });
        });

        filterAndPaginate();
    });
</script>