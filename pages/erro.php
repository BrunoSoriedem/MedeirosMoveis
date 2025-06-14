<style>
    .container {
        text-align: center;
        padding: 2rem;
        max-width: 600px;
        animation: fadeIn 0.8s ease-out;
        margin-top: 50px;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .error-icon {
        width: 200px;
        height: 200px;
        margin: 0 auto 2rem;
        position: relative;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .sofa-svg {
        width: 100%;
        height: 100%;
    }

    .error-code {
        font-size: 6rem;
        font-weight: bold;
        color: #000;
        margin-bottom: 1rem;
        position: relative;
        letter-spacing: 0.1em;
    }

    .error-code span {
        display: inline-block;
        animation: bounce 0.6s ease-out;
        animation-delay: calc(var(--i) * 0.1s);
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        40% {
            transform: translateY(-20px);
        }
    }

    .error-message {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 1rem;
        font-weight: 500;
    }

    .error-description {
        font-size: 1rem;
        color: #666;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .btn-container {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-block;
        padding: 12px 30px;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-primary {
        background-color: #2ECC40;
        color: white;
        border: 2px solid #2ECC40;
    }

    .btn-primary:hover {
        background-color: #27ae34;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(46, 204, 64, 0.3);
    }

    .btn-secondary {
        background-color: transparent;
        color: #000;
        border: 2px solid #000;
    }

    .btn-secondary:hover {
        background-color: #000;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .decoration {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        pointer-events: none;
        overflow: hidden;
    }

    .shape {
        position: absolute;
        opacity: 0.05;
    }

    .shape-1 {
        width: 200px;
        height: 200px;
        background-color: #2ECC40;
        border-radius: 50%;
        top: -100px;
        right: -100px;
        animation: rotate 20s linear infinite;
    }

    .shape-2 {
        width: 150px;
        height: 150px;
        background-color: #000;
        transform: rotate(45deg);
        bottom: -75px;
        left: -75px;
        animation: rotate -15s linear infinite;
    }

    .shape-3 {
        width: 100px;
        height: 100px;
        background-color: #2ECC40;
        top: 50%;
        right: 10%;
        transform: rotate(45deg);
        animation: rotate 25s linear infinite;
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @media (max-width: 768px) {
        .error-code {
            font-size: 4rem;
        }

        .error-message {
            font-size: 1.2rem;
        }

        .error-description {
            font-size: 0.9rem;
        }

        .btn {
            padding: 10px 25px;
            font-size: 0.9rem;
        }
    }
</style>

<div class="decoration">
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    <div class="shape shape-3"></div>
</div>

<div class="container">
    <div class="error-icon">
        <svg class="sofa-svg" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <!-- Sofá simplificado -->
            <rect x="30" y="80" width="140" height="60" rx="10" fill="#2ECC40" />
            <rect x="30" y="100" width="140" height="40" rx="5" fill="#27ae34" />

            <!-- Almofadas -->
            <rect x="40" y="70" width="50" height="35" rx="5" fill="#333" />
            <rect x="100" y="70" width="50" height="35" rx="5" fill="#333" />

            <!-- Pés do sofá -->
            <rect x="40" y="140" width="10" height="20" fill="#000" />
            <rect x="150" y="140" width="10" height="20" fill="#000" />

            <!-- Ponto de interrogação -->
            <text x="100" y="100" text-anchor="middle" font-size="40" font-weight="bold" fill="white">?</text>
        </svg>
    </div>

    <h1 class="error-code">
        <span style="--i: 0">4</span>
        <span style="--i: 1">0</span>
        <span style="--i: 2">4</span>
    </h1>

    <h2 class="error-message">Ops! Não encontramos essa página.</h2>

    <p class="error-description">
        Parece que a página que você está tentando acessar foi removida ou alterada.
        Que tal explorar nossa coleção completa ou voltar para a página inicial?
    </p>

    <div class="btn-container">
        <a href="home" class="btn btn-primary">Voltar ao Início</a>
        <a href="produtos#moveis" class="btn btn-secondary">Ver Produtos</a>
    </div>
</div>

<script>
    // Adiciona efeito de parallax suave aos shapes
    document.addEventListener('mousemove', (e) => {
        const shapes = document.querySelectorAll('.shape');
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;

        shapes.forEach((shape, index) => {
            const speed = (index + 1) * 20;
            shape.style.transform = `translate(${x * speed}px, ${y * speed}px) rotate(${x * 360}deg)`;
        });
    });

    // Efeito de hover nos botões
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function(e) {
            const ripple = document.createElement('span');
            ripple.style.position = 'absolute';
            ripple.style.width = '0';
            ripple.style.height = '0';
            ripple.style.borderRadius = '50%';
            ripple.style.backgroundColor = 'rgba(255, 255, 255, 0.5)';
            ripple.style.transform = 'translate(-50%, -50%)';
            ripple.style.pointerEvents = 'none';
            ripple.style.transition = 'width 0.5s, height 0.5s';

            const rect = this.getBoundingClientRect();
            ripple.style.left = `${e.clientX - rect.left}px`;
            ripple.style.top = `${e.clientY - rect.top}px`;

            this.appendChild(ripple);

            setTimeout(() => {
                ripple.style.width = '300px';
                ripple.style.height = '300px';
            }, 10);

            setTimeout(() => {
                ripple.remove();
            }, 500);
        });
    });
</script>