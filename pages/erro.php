<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro 404 - Medeiros Móveis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Inter" Helvetica, sans-serif;
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

        .erro-container {
            max-width: 1000px;
            margin: auto;
            padding: 100px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.05);
            margin-top: 100px;
        }

        .erro-container img {
            width: 100%;
            max-width: 300px;
            margin-bottom: 20px;
        }

        .btn-voltar {
            margin-top: 20px;
            font-weight: bold;
            padding: 10px 30px;
            border-radius: 50px;
        }
    </style>
</head>

<body>
    <section class="erro">
        <div class="erro-container">
            <h1 class="display-4 text-danger fw-bold">Erro 404</h1>
            <h2 class="mb-4">A página que você está tentando acessar<br>não existe ou foi removida.</h2>
            <img src="imagens/404.webp" alt="Página não encontrada">
            <div>
                <a href="home" class="btn btn-danger btn-voltar">Voltar para a Página Inicial</a>
            </div>
        </div>
    </section>
</body>

</html>