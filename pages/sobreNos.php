<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechPro Max - Redefinindo o Futuro</title>
    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Inter", Helvetica, sans-serif;
        }

        [data-aos] {
            z-index: 0;
            transform: translateY(50px);
        }

        html {
            scroll-behavior: smooth;
        }

        html,
        body {
            height: 100%;
            overflow-x: hidden;
        }

        body {
            /* display: flex; */
            /* align-items: center; */
            justify-content: center;
            height: 100vh;
            /* background: #252525; */
            /* min-height: 100%; */
            /* margin: 0; */
            /* font-size: 14px; */
            /* letter-spacing: 1px; */
            /* line-height: 1.5; */
        }

        main {
            width: 100%;
            padding-top: 5%;
        }

        img {
            display: block;
            width: 100%;
            height: 100%;
        }

        .nossa-historia {
            font-size: 50px;
            background: rgb(15, 101, 15);
            background: -webkit-linear-gradient(to right,
                    #0f3707,
                    rgb(15, 200, 15));
            background: linear-gradient(to right,
                    #072f12,
                    rgb(21, 203, 21));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .inline-block {
            max-width: 100%;
            display: inline-block;
        }

        .page-wrapper {
            z-index: 0;
            position: relative;
        }

        .container {
            z-index: -10;
            width: 90vw;
            max-width: 1360px;
            margin-left: auto;
            margin-right: auto;
        }

        .margin-bottom-medium {
            margin-bottom: 32px;
        }

        .margin-bottom-medium-inverso {
            /* margin-bottom: 32px; */
        }

        .paragraph-large {
            letter-spacing: -0.02em;
            font-size: 20px;
        }

        .section-timeline-heading {
            background-color: #ffffff;
        }

        .padding-vertical-xlarge {
            padding-top: 100px;
            padding-bottom: 80px;
        }

        .timeline-main_heading-wrapper {
            color: #000000;
            text-align: center;
            max-width: 640px;
            margin-left: auto;
            margin-right: auto;
        }

        .timeline_component {
            flex-direction: column;
            justify-content: center;
            align-items: center;
            max-width: 1120px;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            position: relative;
        }

        /* esse que vou usar pra trocar os lados */
        .timeline_item {
            z-index: 2;
            grid-column-gap: 0px;
            grid-row-gap: 0px;
            grid-template-rows: auto;
            grid-template-columns: 1fr 180px 1fr;
            grid-auto-columns: 1fr;
            padding-top: 80px;
            padding-bottom: 80px;
            display: grid;
            position: relative;
        }

        .timeline_item-inverso {
            /* z-index: 2;
    grid-column-gap: 0px;
    grid-row-gap: 0px;
    grid-template-rows: auto;
    /* grid-template-columns: 1fr -180px 1fr; */
            /* grid-auto-columns: 1fr; */
            /* padding-top: 80px;
    padding-bottom: 80px;
    display: grid;
    position: relative; */
        }

        .timeline_left {
            text-align: right;
            justify-content: flex-end;
            align-items: stretch;
        }

        .timeline_left-inverso {
            text-align: right;
            justify-content: flex-end;
            align-items: stretch;
        }


        .timeline_centre {
            justify-content: center;
            display: flex;
        }

        .timeline_date-text {
            color: #0c7924;
            letter-spacing: -0.03em;
            font-size: 48px;
            font-weight: 500;
            line-height: 1.2;
            position: sticky;
            top: 50vh;
        }

        .timeline_date-text-inverso {
            color: #0c7924;
            letter-spacing: -0.03em;
            font-size: 48px;
            font-weight: 500;
            line-height: 1.2;
            position: sticky;
            top: 50vh;
        }

        .timeline_text {
            color: #000000;
            margin: 50px 0 0 0;
            font-size: 20px;
            font-weight: 500;
            line-height: 1.3;
        }

        .timeline_text-inverso {
            color: #000000;
            margin: 50px 0 0 0;
            font-size: 20px;
            font-weight: 500;
            line-height: 1.3;
        }

        .timeline_circle {
            background-color: #0c9224;
            border-radius: 100%;
            width: 15px;
            min-width: 15px;
            max-width: 15px;
            height: 15px;
            min-height: 15px;
            max-height: 15px;
            position: sticky;
            top: 50vh;
            box-shadow: 0 0 0 8px #ffffff;
        }

        .timeline_progress {
            z-index: 1;
            background-color: #0b6625;
            width: 3px;
            height: 100%;
            position: absolute;
        }

        /* .swiper {
    width: 600px;
    height: 300px;
} */

        .section-timeline {
            z-index: -3;
            background-color: #ffffff;
            position: relative;
        }

        .margin-bottom-xlarge {
            margin-bottom: 56px;
        }

        .timeline_link {
            opacity: 0.6;
            color: #fff;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            border-radius: 8px;
            align-items: center;
            font-size: 14px;
            font-weight: 700;
            line-height: 1.3;
            text-decoration: none;
            transition: opacity 0.3s;
            display: flex;
        }

        .timeline_link:hover {
            opacity: 1;
        }

        .link-icon {
            width: 20px;
            height: 20px;
            margin-left: 8px;
        }

        .inline-block {
            display: inline-block;
        }

        .text-colour-lightgrey {
            color: #ffffffa6;
        }



        .container.text-center {
            margin-bottom: 80px;
        }

        .img-loja-antiga {
            border-radius: 15px;
            box-shadow: 5px 5px 10px rgb(0, 0, 0, 0.2);
            transition: transform 0.5s ease;
        }

        .img-loja-antiga:hover {
            transform: scale(1.005);
        }


        .data-foto-antiga {
            text-align: start;
            font-size: 15px;
        }

        .text-historia {
            text-align: justify;
            font-size: 17px;
        }

        .card {
            align-items: center;
            display: flex;
            position: relative;
            margin: auto;
        }

        .localizacao-section {
            padding: 60px 20px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .localizacao-section h3 {
            font-size: 2rem;
            margin-bottom: 40px;
            color: #0d7722;
        }

        .localizacao-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
            text-align: left;
        }

        .localizacao-texto {
            flex: 1;
            min-width: 300px;
            max-width: 500px;
            font-size: 1.3rem;
            color: #000000;
            line-height: 1.6;
        }

        .localizacao-mapa {
            flex: 1;
            min-width: 300px;
            max-width: 600px;
            border: 3px solid rgb(9, 139, 48);
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
        }

        .mapa-embed {
            width: 100%;
            height: 100%;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }


        .section-dois {
            background: rgb(11, 125, 77);
            padding-top: 5%;
            padding-bottom: 5%;

        }

        .timeline {
            position: relative;
            margin: 2rem auto;
            padding: 2rem 0;
            width: 90%;
            max-width: 600px;
            border-left: 3px solid #ccc;
        }

        .timeline-item {
            position: relative;
            padding-left: 30px;
            margin-bottom: 2rem;
        }

        .timeline-dot {
            position: absolute;
            top: 0;
            left: -9px;
            width: 18px;
            height: 18px;
            background: #4e73df;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0 0 2px #4e73df;
        }

        .timeline-content {
            background: #f8f9fc;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }


        .espaco-timeline {
            z-index: -3;
            background-color: #ffffff !important;
            position: relative;

        }

        .overlay-fade-top {
            z-index: -3;
            background-image: linear-gradient(#ffffff, #0a0a0a00);
            height: 80px;
            position: absolute;
            inset: 0% 0% auto;
        }

        .overlay-fade-bottom {
            z-index: -3;
            background-image: linear-gradient(to top, #ffffff, #0a0a0a00);
            height: 80px;
            position: absolute;
            inset: auto 0% 0%;
        }

        .espaco-final {
            z-index: 999 ! important;
            background-color: #ffffff;
        }

        .equipe {

            margin-bottom: 5%;

            .conteudo {
                display: flex;
                align-items: flex-start;
                max-width: 1100px;
                margin: 0 auto;
            }

            .barra-verde {
                width: 6px;
                height: 190px;
                background-color: #ffffff;
                margin-right: 20px;
            }

            .escrita-equipe .sub-escrita-equipe {
                color: #ffffff;
                font-size: 18px;
                margin: 0 0 10px;
            }

            .escrita-equipe .titulo-equipe {
                font-size: 48px;
                font-weight: 700;
                color: #ffffff;
                margin: 0 0 20px;
                line-height: 1.2;
            }

            .escrita-equipe .descricao-equipe {
                font-size: 16px;
                color: #ffffff;
                line-height: 1.6;
            }
        }



        /* .carousel-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    width: 100%;
    overflow: hidden;
    padding: 20px 0;
    background: linear-gradient(135deg, #fefefe, #f6f6f6);
}

.carousel-container {
    width: 90%;
    overflow: hidden;
    display: flex;
    justify-content: center;
}

.carousel-track {
    display: flex;
    justify-content: center;
    gap: 12px;
    transition: transform 0.8s ease, opacity 0.6s ease;
    will-change: transform, opacity;
}

.card {
    width: 200px;
    height: 300px;
    background-color: #eee;
    border-radius: 20px;
    opacity: 0.4;
    transform: scale(0.85);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    flex-shrink: 0;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
    transition:
        transform 0.7s ease,
        opacity 0.6s ease,
        box-shadow 0.5s ease,
        filter 0.4s ease;
    filter: grayscale(40%) brightness(0.9);
}

.card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 20px;
    transition: transform 0.6s ease;
}

.card.active {
    transform: scale(1.1);
    opacity: 1;
    background-color: #fff;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.18);
    filter: none;
    z-index: 2;
}

.card.active img {
    transform: scale(1.03);
}

.carousel-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    font-size: 1.6rem;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    border-radius: 50%;
    padding: 10px 14px;
    cursor: pointer;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
    backdrop-filter: blur(4px);
    opacity: 0.8;
}

.carousel-btn.prev {
    left: 2%;
}

.carousel-btn.next {
    right: 2%;
}

.carousel-btn:hover {
    font-size: 1.7rem;
    transform: translateY(-50%) scale(1.1);
    background: #fff;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
    opacity: 1;
}

.dots-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 16px;
    opacity: 0.9;
    transition: opacity 0.3s ease;
}

.dot {
    width: 12px;
    height: 12px;
    background: #d0d0d0;
    border-radius: 50%;
    margin: 0 5px;
    transition: background 0.5s ease, transform 0.4s ease;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.dot.active-dot {
    background: #222;
    transform: scale(1.2);
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.3);
} */

        .section-funcionarios {
            width: 100%;
            padding: 20px;
        }

        .swiper {
            margin: 50px auto;
            padding-bottom: 60px;
            user-select: none;
        }

        .swiper-slide {
            background-color: red !important;
            position: relative;
            height: 500px;
            border-radius: 30px;
            overflow: hidden;
            filter: grayscale(20%) brightness(80%);
            pointer-events: none;
            will-change: transform;
        }

        .swiper-slide-active {
            perspective: 1000px;
            filter: grayscale(0) brightness(100%);
            pointer-events: auto;
            padding: 10px 0;
            transition: all 0.3s ease-in-out;
        }

        .swiper-slide-active .card {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.5s;
        }

        .flipped .card {
            transform: rotateY(180deg);
        }

        .swiper-slide .front,
        .swiper-slide .back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 30px;
        }

        .swiper-slide .front::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle closest-side, #658bd9 3px, transparent 3px);
            background-size: 8px 8px;
            transition: opacity 0.2s cubic-bezier(0.86, 0, 0.07, 1);
            opacity: 0.3;
        }

        .swiper-slide-active .front::before {
            opacity: 0;
        }

        .swiper-slide .back {
            opacity: 0;
        }

        .swiper-slide .back::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(35, 35, 39, 0.7);
            border-radius: inherit;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            mix-blend-mode: darken;
        }

        .swiper-slide-active .back {
            opacity: 1;
            transform: rotateY(180deg);
        }

        .swiper-slide-active .back p {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1rem;
            line-height: 1.5;
            color: #fff;
            width: 80%;
        }

        .swiper-slide img {
            object-fit: cover;
            border-radius: 30px;
            pointer-events: none;
        }

        .swiper-slide button {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%) scale(1);
            box-shadow: 0 7px 30px 0 rgba(100, 100, 111, 0.2);
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            color: #fff;
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: 1px;
            padding: 8px 0;
            text-align: center;
            width: 60%;
            outline: 0;
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 30px;
            user-select: none;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            opacity: 0;
            pointer-events: none;
            will-change: transform;
        }

        .swiper-slide-active button {
            opacity: 1;
            pointer-events: auto;
        }

        .swiper-slide button:hover {
            transform: translateX(-50%) scale(0.98);
        }

        .swiper-pagination-bullet {
            width: 18px;
            height: 18px;
            background-color: #7e7e7e;
            border-radius: 50%;
            transition: all 0.6s ease-in-out;
        }

        .swiper-pagination-bullet-active {
            width: 36px;
            background-color: #717271;
            border-radius: 14px;
        }





























        @media screen and (max-width: 768px) {

            .swiper-slide {
                flex-direction: column;
            }

            h2 {
                font-size: 40px;
            }

            .paragraph-large {
                font-size: 18px;
            }

            .padding-vertical-xlarge {
                padding-top: 80px;
                padding-bottom: 80px;
            }

            .timeline_item {
                grid-template-columns: 64px 1fr;
                width: 100%;
            }

            .timeline_left {
                text-align: left;
                grid-area: 1 / 2 / 2 / 3;
            }

            .timeline_centre {
                justify-content: flex-start;
                grid-area: 1 / 1 / 3 / 2;
            }

            .timeline_right {
                grid-area: span 1 / span 1 / span 1 / span 1;
            }

            .timeline_right-inverso {
                /* grid-area: span 1 / span 1 / span 1 / span 1; */
            }

            .timeline_date-text {
                margin-bottom: 24px;
                font-size: 36px;
            }

            .timeline_text {
                font: 20px;
            }

            .timeline_progress {
                left: 6px;
            }

            .margin-bottom-xlarge {
                margin-bottom: 48px;
            }

        }
    </style>

    <section>
        <div class="page-wrapper">
            <div class="section-timeline-heading">
                <div class="container">
                    <div class="padding-vertical-xlarge">
                        <div class="timeline-main_heading-wrapper">
                            <div class="margin-bottom-medium">
                                <h2 class="nossa-historia">Nossa História</h2>
                            </div>
                            <p class="paragraph-large">
                                A história da empresa começou a ser escrita em 10 de março de 2005, na cidade de
                                Juranda, interior do Paraná. Tudo teve início com uma sociedade entre Paulo
                                Medeiros e seu irmão Alcides Medeiros, em um pequeno prédio de pouco mais de
                                150m².
                                <br>
                                Porém em 2014, um grande marco redefiniu o rumo da empresa: nasceu a <strong>S
                                    E F
                                    MEDEIROS</strong>, após a separação societária entre os irmãos Medeiros.
                                Apesar da mudança, a motivação permaneceu a mesma: Proporcionar a você a certeza
                                de um <strong>Ótimo Negócio</strong>!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-timeline">
                <div class="container">
                    <div class="timeline_component">
                        <div class="timeline_progress">
                            <div class="timeline_progress-bar"></div>
                        </div>
                        <div class="timeline_item">
                            <div class="timeline_left">
                                <div class="timeline_date-text">Março 2005</div>
                            </div>
                            <div class="timeline_centre">
                                <div class="timeline_circle"></div>
                            </div>
                            <div class="timeline_right">
                                <div class="margin-bottom-xlarge">
                                    <div class="timeline_text">
                                        Nos primeiros 11 meses, eles trabalharam dali, até que, ainda na mesma avenida,
                                        mudaram para um espaço maior, de quase 300 m². Era o primeiro passo
                                        de uma jornada que prometia crescimento e muito trabalho em família.
                                        <br>
                                        Em 2008, a Medeiros Móveis deu mais um passo importante:
                                        mudou-se para a Avenida Paraná, em um prédio ainda maior,
                                        com 500 metros quadrados. O crescimento não parou por aí –
                                        pouco depois, abriram uma filial em Ubiratã, também em um espaço amplo,
                                        de quase 500 m².
                                    </div>
                                </div>
                                <div class="timeline_image-wrapper">
                                    <img src="imagens/frente loja 2005.jpg" loading="lazy" width="480"
                                        alt="Entrada da Loja Antigamente" />
                                </div>
                            </div>
                        </div>

                        <div class="timeline_item">
                            <div class="timeline_left">
                                <div class="timeline_date-text">Março 2014</div>
                            </div>
                            <div class="timeline_centre">
                                <div class="timeline_circle"></div>
                            </div>
                            <div class="timeline_right">
                                <div class="margin-bottom-medium">
                                    <div class="timeline_text">
                                        Na década seguinte, a empresa consolidou sua marca, investindo em estoque
                                        diversificado, atendimento personalizado e estratégias de vendas.
                                        A sociedade entre os irmãos Medeiros seguia forte, mas
                                        em 2013, decidiram seguir caminhos separados.
                                        <br>
                                        A partir de 2 de janeiro de 2014,
                                        Alcides ficou com a loja de Ubiratã, e Paulo continuou em Juranda,
                                        liderando a matriz na Avenida Paraná.
                                        Nos anos seguintes, mesmo com desafios do mercado, a Medeiros
                                        Móveis manteve-se sólida, conquistando a confiança dos clientes e se
                                        adaptando às mudanças.
                                    </div>
                                </div>
                                <div class="timeline_image-wrapper-inverso">
                                    <img src="imagens/imgs loja/frenteLojaAntigaCerto.jpg" loading="lazy" width="480"
                                        alt="Entrada da Loja Antigamente" />
                                </div>
                            </div>
                        </div>

                        <div class="timeline_item">
                            <div class="timeline_left">
                                <div class="timeline_date-text">Março 2025</div>
                            </div>
                            <div class="timeline_centre">
                                <div class="timeline_circle"></div>
                            </div>
                            <div class="timeline_right">
                                <div class="margin-bottom-medium">
                                    <div class="timeline_text">
                                        Hoje, em 2024, a Medeiros Móveis completa 20 anos de uma trajetória marcada
                                        por crescimento, superação e muito trabalho. Desde 2008 na Avenida Paraná,
                                        em Juranda, a loja passou por diversas melhorias e consolidou-se como
                                        referência no comércio móveis. Com as vendas em alta e um futuro promissor
                                        pela frente, Paulo Medeiros segue à frente do negócio, celebrando não apenas
                                        o sucesso, mas também a história de dedicação que construiu ao longo dessas
                                        duas décadas. Uma jornada de fé, família e perseverança!
                                    </div>
                                </div>
                                <div class="timeline_image-wrapper margin-bottom-medium">
                                    <img src="imagens/frenteLojaAntigaCerto.jpg" loading="lazy" width="480"
                                        alt="Entrada da Loja Antigamente" />
                                </div>
                            </div>
                        </div>

                        <div class="overlay-fade-top"></div>
                        <div class="overlay-fade-bottom"></div>
                    </div>
                </div>

                <div class="espaco-final" style="height: 20vh;"></div>
            </div>
        </div>
    </section>


    <section class="section-funcionarios">
        <div class="section-dois">
            <div class="equipe">
                <div class="conteudo">
                    <div class="barra-verde"></div>
                    <div class="escrita-equipe">
                        <h4 class="sub-escrita-equipe">Nossa Equipe</h4>
                        <h2 class="titulo-equipe">Equipe de Profissionais Altamente Focados</h2>
                        <p class="descricao-equipe">
                            Usamos toda nossa experiência de mais de <strong>20 anos</strong> para entender suas
                            necessidades e
                            oferecer soluções que realmente fazem a diferença.
                            <br />
                            Oferecemos móveis que aliam design inteligente, conforto e resistência para
                            valorizar cada espaço da sua casa.
                        </p>
                    </div>
                </div>
            </div>

            <div class="swiper equipeSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="front">
                                <img src="imagens/funcionarios/edcarlo.png" alt="">
                                <button>Leia Mais</button>
                            </div>
                            <div class="back">
                                <img src="imagens/funcionarios/edcarlo.png" alt="">
                                <p>Nome e Função
                                    Nome e Função
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="front">
                                <img src="imagens/funcionarios/edcarlo.png" alt="">
                                <button>Leia Mais</button>
                            </div>
                            <div class="back">
                                <img src="imagens/funcionarios/edcarlo.png" alt="">
                                <p>Nome e Função
                                    Nome e Função
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="front">
                                <img src="imagens/funcionarios/edcarlo.png" alt="">
                                <button>Leia Mais</button>
                            </div>
                            <div class="back">
                                <img src="imagens/funcionarios/edcarlo.png" alt="">
                                <p>Nome e Função
                                    Nome e Função
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="front">
                                <img src="imagens/funcionarios/edcarlo.png" alt="">
                                <button>Leia Mais</button>
                            </div>
                            <div class="back">
                                <img src="imagens/funcionarios/edcarlo.png" alt="">
                                <p>Nome e Função
                                    Nome e Função
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="front">
                                <img src="imagens/funcionarios/edcarlo.png" alt="">
                                <button>Leia Mais</button>
                            </div>
                            <div class="back">
                                <img src="imagens/funcionarios/edcarlo.png" alt="">
                                <p>Nome e Função
                                    Nome e Função
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="front">
                                <img src="imagens/funcionarios/edcarlo.png" alt="">
                                <button>Leia Mais</button>
                            </div>
                            <div class="back">
                                <img src="imagens/funcionarios/edcarlo.png" alt="">
                                <p>Nome e Função
                                    Nome e Função
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="front">
                                <img src="imagens/funcionarios/edcarlo.png" alt="">
                                <button>Leia Mais</button>
                            </div>
                            <div class="back">
                                <img src="imagens/funcionarios/edcarlo.png" alt="">
                                <p>Nome e Função
                                    Nome e Função
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
    </section>

    <section class="localizacao-section">
        <h3 class="text text-center">Nossa localização</h3>
        <div class="localizacao-container">
            <div class="localizacao-texto">
                <p>
                    Nós estamos localizados em uma pequena cidade no interior do Paraná,
                    chamada Juranda, e popularmente conhecida como "Juranda, a Cidade do Milagre".
                    <br><br>
                    A Medeiros Móveis desde o dia de sua inauguração, até os dias atuais,
                    permaneceu no mesmo ponto, apenas passando por algumas reformas
                    com o passar do tempo. Continuamos no mesmo lugar, na mesma avenida
                    e com o mesmo número.
                    <br><br>
                    Confira nossa localização ao lado, e venha conhecer a gente!
                </p>
            </div>
            <div class="localizacao-mapa">
                <iframe class="mapa-embed"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3632.801918696584!2d-52.84543402464318!3d-24.422948178217474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f27197e45cd78d%3A0x59b345a64ebed629!2sAv.%20Paran%C3%A1%2C%201727%20-%20Juranda%2C%20PR%2C%2087355-000!5e0!3m2!1spt-BR!2sbr!4v1747869210141!5m2!1spt-BR!2sbr"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <script>
        var swiper = new Swiper(".equipeSwiper", {
            initialSlide: 3,
            centeredSlides: true,
            loop: true,
            speed: 900,
            grabCursor: true,
            allowTouchMove: false,
            effect: "coverflow",
            coverflowEffect: {
                rotate: -10,
                stretch: -45,
                depth: 90,
                modifier: 1,
                slideShadows: true,
            },
            mousewheel: {
                thresholdDelta: 50,
                sensitivity: 1,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                600: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 5,
                },
            },
        });

        const slides = document.querySelectorAll(".swiper-slide");

        function flipActiveSlide() {
            const activeSlide = document.querySelector(".swiper-slide-active");
            const button = activeSlide?.querySelector("button");

            if (button) {
                button.addEventListener("click", (event) => {
                    event.stopPropagation();
                    activeSlide.classList.toggle("flipped");
                });
            }
        }

        slides.forEach((slide) => {
            slide.addEventListener("click", () => {
                if (
                    slide.classList.contains("swiper-slide-active") &&
                    slide.classList.contains("flipped")
                ) {
                    slide.classList.remove("flipped");
                }
            });
        });

        swiper.on("slideChangeTransitionStart", () => {
            slides.forEach((slide) => {
                slide.classList.remove("flipped");
            });
            flipActiveSlide();
        });

        flipActiveSlide();
    </script>