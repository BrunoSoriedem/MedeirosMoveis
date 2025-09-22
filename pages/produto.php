<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/sessao.php';

use App\Controller\ProdutosController;
use App\Model\Produtos;

$produtos = App\Model\Produtos::findAll();
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/nav-footer.css">
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
            <?php foreach ($produtos as $item):
                if ($item->getMoveis() === "sim") {
                    $categoria = "moveis";
                } elseif ($item->getPlanejados() === "sim") {
                    $categoria = "planejados";
                } elseif ($item->getEstofados() === "sim") {
                    $categoria = "estofados";
                } elseif ($item->getEletros() === "sim") {
                    $categoria = "eletros";
                } else {
                    continue;
                }
            ?>

                <div class="card-produto" data-category="<?= $categoria ?>">
                    <img src="<?= htmlspecialchars($item->getDiretorioImagem()) ?>"
                        alt="<?= htmlspecialchars($item->getDescricao()) ?>">
                    <h3><?= htmlspecialchars($item->getDescricao()) ?></h3>
                    <div class="avaliacao">★★★★★</div>
                    <p class="preco-novo">R$ <?= number_format($item->getPrecoAV(), 2, ',', '.') ?></p>
                    <p class="preco-info">R$ <?= number_format($item->getPrecoAP(), 2, ',', '.') ?></p>
                    <button class="btn-whatsapp" data-phone="5544999870212">
                        <i class="fa-brands fa-whatsapp"></i>
                        Comprar no WhatsApp
                    </button>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
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

        function setActiveButton() {
            buttons.forEach(btn => {
                btn.classList.remove("active");
                if (btn.getAttribute("data-category") === currentCategory) {
                    btn.classList.add("active");
                }
            });
        }

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

                history.pushState(null, null, `produto.php?categoria=${currentCategory}`);

                setActiveButton();

                filterAndPaginate();
            });
        });

        filterAndPaginate();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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