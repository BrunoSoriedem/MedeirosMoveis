<link rel="stylesheet" href="css/nav-footer.css">

<style>
    .container {
        text-align: center;
        padding: 2rem;
        max-width: 700px;
        animation: fadeIn 0.8s ease-out;
        margin-top: 80px;
        margin-bottom: 40px;
    }
    .bemvindo-container{
      display: flex;
      flex-wrap: wrap;
      gap: 40px;
      max-width: 1200px;
      margin: 100px auto;
      padding: 40px;
      background: #fff;
      box-shadow: 0 0 40px rgba(0,0,0,0.05);
      border-radius: 16px;

    }

    .error-code {
      font-size: 2.7rem;
      color: #000;
      display:inline-block ;
    }

    .error-code::after {
      content: '';
      display: block;
      width: 50px;
      height: 4px;
      background-color: #2ecc71;
      margin: 15px auto ;
    }

    .error-message{ 
        font-size: 1.2rem;
        margin: 1rem 0 2rem;
        
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
        background-color: #2ecc71;
        color: white;
        text-decoration: none;
        border-radius: 10px;
        font-weight: bold;
        transition: all 0.3s ease;
        border: 2px solid #2ecc71;
        position: relative;
        overflow: hidden;
    }

    .btn-primary:hover {
        background-color: #fff;
        color: #2ecc71;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        border: 2px solid #2ecc71;
    }

    .btn-secondary {
        background-color: transparent;
        color: #000;
        border: 2px solid #000;
    }

    .btn-secondary:hover {
        background-color: #000;
        color: white;
        transform: translateY(-5px);
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
<div class= bemvindo-container>
  <div class="bemvindo-box">
  
 <h2 class="error-code">Bem Vindo</h2>

<div class= "error-description" >
  
  <p class="error-message">
    Sua conta foi criada com sucesso. Estamos felizes em ter você conosco!
  </p>
  
<div class="btn-container">
        <a href="home" class="btn btn-primary">Voltar ao Início</a>
        <a href="produto?categoria=moveis" class="btn btn-secondary">Ver Produtos</a>
    </div>

</div>
</div>