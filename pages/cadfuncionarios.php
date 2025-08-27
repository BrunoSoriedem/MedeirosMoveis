<link rel="stylesheet" href="css/nav-footer.css">
<link rel="stylesheet" href="css/cadfunc.css">

  
<div class="container-cadFunc">
    <h2>Cadastro de Funcionários</h2>
    <?php if (!empty($mensagem)) echo $mensagem; ?>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="cargo" required>

        
        <label>Imagem do Funcionário:</label>
      <input type="text" name="diretorio_imagem" placeholder="ex: /imagens/funcionario1.jpg">


        <div class="btn-container">
            <button type="submit" class="btn btn-primary">Cadastrar Funcionário</button>
        </div>
    </form>
</div>

