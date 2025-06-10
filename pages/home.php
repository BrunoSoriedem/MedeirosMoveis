<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medeiros Móveis</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Inter", Helvetica, sans-serif;
        }

        [data-aos] {
            z-index: 0;
        }


        html {
            scroll-behavior: smooth;
        }

        html,
        body {
            height: 100%;
            overflow-x: hidden;
            position: relative;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        img {
            max-width: 100%;
        }

        main {
            width: 100%;
        }

        .gradiant {
            z-index: 999;
            padding: 20%;
            width: 100%;
            height: 27.0%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: transparent;
            background-image: linear-gradient(140deg, #000000 0%, rgb(24, 79, 46) 70%, rgb(16, 96, 50) 100%);
            transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
        }

        .swiper-section {
            width: 100%;
            padding: 0;
            margin: 0;
            background: #ffffff;
            overflow: hidden;
        }

        .mySwiper {
            width: 100%;
            height: 85vh;
        }

        .swiper-slide {
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 1s ease-in-out;
        }

        .swiper-slide img {
            width: 100%;
            height: 85vh;
            object-fit: cover;
            border-radius: 15px;
            filter: brightness(0.85);
            transition: transform 1.5s ease;
        }

        .swiper-slide:hover img {
            transform: scale(1.05);
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #fff;
            transition: all 0.3s ease;
            color: #11a10a;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            color: rgb(14, 201, 8);
        }

        .swiper-pagination-bullet {
            background: #000000;
            opacity: 0.7;
            transition: transform 0.3s ease;
        }

        .swiper-pagination-bullet-active {
            background: #08771e;
            transform: scale(1.3);
        }

        .slide-com-overlay {
            position: relative;
        }

        .slide-com-overlay img {
            width: 100%;
            height: 100vh;
            object-fit: cover;
            filter: brightness(0.5);
        }

        .conteudo-sobreposto {
            position: absolute;
            top: 50%;
            left: 10%;
            transform: translateY(-50%);
            color: white;
            max-width: 600px;
            z-index: 10;
            padding: 2rem;
        }

        .conteudo-sobreposto h1 {
            font-size: 2.8rem;
            line-height: 1.3;
        }

        .conteudo-sobreposto .destaque {
            color: #00ff90;
            font-weight: bold;
        }

        .conteudo-sobreposto p {
            font-size: 1.2rem;
            margin: 1rem 0 2rem;
        }

        .botao-whatsapp {
            background-color: #25D366;
            color: white;
            padding: 0.8rem 1.6rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: background 0.3s ease;
        }

        .botao-whatsapp:hover {
            background-color: #1ebe5b;
        }

        .img-col {
            margin-top: 15%;
            width: 80%;
            height: 350px;
            border-radius: 15px;
            max-width: 80%;
            transition: all 0.2s ease-in-out;
        }

        .img-col:hover {
            transform: scale(1.008);
            box-shadow: 0 15px 30px 0 rgba(61, 61, 66, 0.2);
        }

        #fundoPrimeiro-slide {
            filter: brightness(0.3);
        }

        .img-col {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .categoria-imagem {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .botao-cliqueAqui {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #25D366;
            color: white;
            padding: 0.8rem 1.6rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: background 0.3s ease, transform 0.3s ease;
            z-index: 2;
        }

        .botao-cliqueAqui:hover {
            background-color: #1db954;
            transform: translateX(-50%) scale(1.05);
        }

        .categoria-item-principal {
            padding: 15px;
            transition: transform 0.3s ease;
        }

        .categoria-item-principal:hover .img-col {
            transform: scale(1.05);
        }

        .categorias-prod {
            padding: 50px 20px;
            text-align: center;
        }

        .escrita-categoria {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .categorias-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
        }

        .categoria-item {
            width: 170px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .categoria-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .categoria-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .categoria-item p {
            margin-top: 10px;
            font-weight: 500;
            font-size: 1rem;
            color: #333;
        }





        .text.text-center {
            font-weight: bold;
        }

        .swiper {
            width: 100%;
            padding: 80px 0;
        }

        .card-produto {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 20px;
            width: 260px;
            max-width: 100%;
            text-align: center;
            position: relative;
            transition: transform 0.3s ease-in-out;
        }

        .card-produto:hover {
            transform: translateY(-20px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .card-produto img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
            object-fit: cover;
        }

        .desconto {
            position: absolute;
            top: 10px;
            left: 10px;
            background: black;
            color: white;
            padding: 5px 10px;
            border-radius: 50%;
            font-size: 12px;
            z-index: 1;
        }

        .tags {
            margin-bottom: 8px;
        }

        .tag {
            display: inline-block;
            background: #f1c40f;
            color: black;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            margin: 0 2px;
        }

        .card-produto h3 {
            font-size: 16px;
            margin: 10px 0;
        }

        .avaliacao {
            color: #f1c40f;
            font-size: 14px;
        }

        .preco-antigo {
            text-decoration: line-through;
            color: #888;
            font-size: 14px;
        }

        .preco-novo {
            font-size: 20px;
            font-weight: bold;
            margin: 5px 0;
        }

        .preco-info {
            font-size: 13px;
            color: #555;
            margin-bottom: 10px;
        }

        .btn-verde,
        .btn-whatsapp {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            margin-top: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.2s ease-in-out;
        }

        .btn-verde {
            background-color: #2ecc71;
            color: white;
        }

        .btn-verde:hover {
            background-color: rgb(7, 114, 51);
            transform: translateY(-5px);
        }

        .btn-whatsapp {
            background-color: #fff;
            color: #2ecc71;
            transition: all 0.2s ease-in-out;
            border: 2px solid #2ecc71;
        }

        .btn-whatsapp:hover {
            transform: translateY(-5px);
            background-color: whitesmoke;
        }

        #escrita-vendidos {
            margin-top: 7%;
        }

        #card-novidades:hover {
            border: 1px solid black;
        }

        #card-vendidos:hover {
            border: 1px solid black;
        }

        #testimonials {
            padding: 60px 20px;
            /* background: #f5f5f5; */
            text-align: center;
        }

        #testimonials_header h1 {
            color: #0a9148;
            font-size: 18px;
            font-weight: 600;
        }

        #testimonials_header h2 {
            font-size: 32px;
            margin-top: 10px;
            margin-bottom: 10px;
            font-weight: 700;
            color: #111;
        }

        #testimonials_header p {
            max-width: 500px;
            margin: 0 auto 40px;
            font-size: 16px;
            color: #555;
        }

        .testimonial-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            max-width: 500px;
            margin: auto;
            height: 100%;
        }

        .testimonial-card::before {
            content: '\201C';
            font-size: 5rem;
            color: #2ecc71;
            opacity: 0.2;
            position: absolute;
            top: 40px;
            left: 10px;
        }

        .testimonial-rate i {
            color: #2ecc71;
            margin: 0 2px;
        }

        .testimonial-quote {
            font-style: italic;
            color: #333;
            font-size: 16px;
            line-height: 1.6;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .testimonial-author .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .testimonial-author h3 {
            font-size: 16px;
            font-weight: 600;
            color: #111;
            margin-bottom: 3px;
        }

        .testimonial-author p {
            font-size: 14px;
            color: #666;
        }

        /* Swiper Estilo */
        .swiper.mySwiper-testimonials {
            padding-bottom: 60px;
            max-width: 100%;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #0a9148;
        }

        .swiper-pagination-bullet {
            background: #bbb;
            opacity: 0.7;
        }

        .swiper-pagination-bullet-active {
            background: #0a9148;
        }

        .orcamento {
            display: flex;
            align-items: center;
            gap: 8px;
            background-color: rgb(17, 172, 17);
            padding: 15px;
            font-size: 15px;
            margin-top: 10px;
            float: left;
            border-radius: 10px;
            transition: 1s all;
        }

        .infos-img .orcamento i {
            font-size: 20px;
            color: rgb(255, 255, 255);
        }

        .infos-img .orcamento:hover {
            background-color: #126b1f
        }

        .elementor-counter {
            display: flex;
            justify-content: center;
            align-items: start;
            flex-direction: column-reverse;
        }

        .elementor-counter .elementor-counter-number-wrapper {
            flex: 1;
            display: flex;
            font-size: 69px;
            font-weight: 600;
            line-height: 1;
            text-align: center;
        }

        .elementor-counter .elementor-counter-number-prefix {
            text-align: start;
            flex-grow: var(--counter-prefix-grow, 1);
            white-space: pre-wrap;
        }

        .elementor-counter-number {
            flex-grow: var(--counter-number-grow, 0);
        }

        .elementor-counter .elementor-counter-number-suffix {
            text-align: start;
            flex-grow: var(--counter-suffix-grow, 1);
            white-space: pre-wrap;
        }

        .escrita-elementor-counter {
            flex-grow: var(--counter-suffix-grow, 0);
        }

        .d-block.w-100 {
            filter: brightness(0.3);
        }
    </style>

    <section class="swiper-section">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide slide-com-overlay">
                    <img id="fundoPrimeiro-slide" src="imagens/imgs loja/fogaoLenha.jpg" alt="Fogão a lenha">
                    <div class="conteudo-sobreposto">
                        <h1><span class="destaque">Móveis Planejados</span> com excelência nos detalhes.</h1>
                        <p>Projetos sob medida que unem conforto, elegância e funcionalidade.</p>
                        <a href="https://wa.me/554499870212?text=Olá,%20gostaria%20de%20um%20orçamento" target="_blank" class="botao-whatsapp">
                            <i class="fab fa-whatsapp"></i> Solicite um orçamento
                        </a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <img src="imagens/imgs loja/colchaoGazin.jpg" alt="Colchão Gazin">
                </div>
                <div class="swiper-slide">
                    <img src="imagens/imgs loja/mesas.jpg" alt="Mesas">
                </div>
                <div class="swiper-slide">
                    <img src="imagens/imgs loja/frenteLojaAntigaCerto.jpg" alt="Mesas">
                </div>
                <div class="swiper-slide">
                    <img src="imagens/imgs loja/mesas.jpg" alt="Mesas">
                </div>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>

        </div>
    </section>



    <section>
        <div class="grid text-center">
            <div class="g-col-6 g-col-md-4 categoria-item-principal">
                <div class="categoria-imagem">
                    <img src="imagens/imgs loja/cadeiraEarmario.jpg" class="img-col">
                    <a class="botao-cliqueAqui">Móveis</a>
                </div>
            </div>
            <div class="g-col-6 g-col-md-4 categoria-item-principal">
                <div class="categoria-imagem">
                    <img src="imagens/imgs loja/umPoucodeCada.jpg" class="img-col">
                    <a class="botao-cliqueAqui">Planejados</a>
                </div>
            </div>
            <div class="g-col-6 g-col-md-4 categoria-item-principal">
                <div class="categoria-imagem">
                    <img src="imagens/imgs loja/tvColchao.jpg" class="img-col">
                    <a class="botao-cliqueAqui">Elétros</a>
                </div>
            </div>
            <div class="g-col-6 g-col-md-4 categoria-item-principal">
                <div class="categoria-imagem">
                    <img src="imagens/imgs loja/sofaMarrom.jpg" class="img-col">
                    <a class="botao-cliqueAqui">Estofados</a>
                </div>
            </div>
        </div>



        <div class="categorias-prod">
            <h2 class="escrita-categoria">Escolha por categoria</h2>
            <div class="categorias-container">
                <div class="row">
                    <?php foreach ($categoriaProd as $categoria): ?>
                        <div class="categoria-item">
                            <img src="<?= $categoria['imagem'] ?>" alt="<?= $categoria['nome'] ?>">
                            <p><?= $categoria['nome'] ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h2 class="text text-center">Conheça as novidades</h2>

        <div class="swiper produtosSwiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="card-produto">
                        <span class="desconto">-1%</span>
                        <img src="imagens/imgs loja/cadeiraEarmario.jpg" alt="Cadeira Padova com Braços">
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
                        <img src="imagens/imgs loja/bulleDourado.jpg" alt="Cadeira Padova com Braços">
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
                        <img src="imagens/imgs loja/cadeiraEarmario.jpg" alt="Cadeira Padova com Braços">
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
                        <img src="imagens/imgs loja/fogoes.jpg" alt="Cadeira Padova com Braços">
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
                        <img src="imagens/imgs loja/tvColchao.jpg" alt="Cadeira Padova com Braços">
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
                        <img src="imagens/imgs loja/piaAzul.jpg" alt="Cadeira Padova com Braços">
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
                        <img src="imagens/imgs loja/tvColchao.jpg" alt="Cadeira Padova com Braços">
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
                    <div class="card-produto">
                        <span class="desconto">-1%</span>
                        <img src="imagens/imgs loja/cadeiraEarmario.jpg" alt="Cadeira Padova com Braços">
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
                    <div class="card-produto">
                        <span class="desconto">-1%</span>
                        <img src="imagens/imgs loja/bulleDourado.jpg" alt="Cadeira Padova com Braços">
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
                        <img src="imagens/imgs loja/cadeiraEarmario.jpg" alt="Cadeira Padova com Braços">
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
                        <img src="imagens/imgs loja/fogoes.jpg" alt="Cadeira Padova com Braços">
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
                        <img src="imagens/imgs loja/tvColchao.jpg" alt="Cadeira Padova com Braços">
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
                        <img src="imagens/imgs loja/piaAzul.jpg" alt="Cadeira Padova com Braços">
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
                        <img src="imagens/imgs loja/tvColchao.jpg" alt="Cadeira Padova com Braços">
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
            <h2>O que os clientes dizem</h2>
            <p>
                Quer saber o que torna a nossa marca tão especial? Confira o que nossos clientes têm a dizer!
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
                            os móveis da minha casa eu só compro na Medeiros Móveis.
                            Muito satisfeita!"</p>
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
                        <p class="testimonial-quote">"Qualidade dos móveis é surpreendente. Muito satisfeita!"</p>
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
                        <p class="testimonial-quote">"Qualidade dos móveis é surpreendente. Muito satisfeita!"</p>
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
                        <p class="testimonial-quote">"Qualidade dos móveis é surpreendente. Muito satisfeita!"</p>
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
                        <p class="testimonial-quote">"Excelente custo-benefício e atendimento humanizado. <br> Muito top"</p>
                        <div class="testimonial-author">
                            <img src="imagens/avatar3.jpg" alt="Cliente" class="avatar" />
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

<body>

</html>