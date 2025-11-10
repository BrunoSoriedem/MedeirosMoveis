<?php
require_once __DIR__ . '/../config/sessao.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\UsuarioController;
use App\Controller\CarrinhoController;

$usuarioCtrl = new UsuarioController();
$dados = $usuarioCtrl->areaUsuario();

$logado        = $dados['logado'];
$msgSenha      = $dados['msgSenha'];
$msgSucesso    = '';
$nomeUsuario   = $dados['nomeUsuario'];
$emailUsuario  = $dados['emailUsuario'];
$perfilUsuario = $dados['perfilUsuario'];
$iniciais      = $dados['iniciais'];

$carrinho = [];
if ($logado) {
    $carrinho = \App\Controller\CarrinhoController::listarRetorno();
}

$total = 0;

if ($msgSenha === '') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['alterar_senha'])) {
        $msgSucesso = "Senha alterada com sucesso!";
    }
}
?>

<link rel="stylesheet" href="css/nav-footer.css">
<link rel="stylesheet" href="css/areaUsuario.css">
<link rel="stylesheet" href="css/carrinho.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="cliente-container">
    <div class="cliente-box">
        <?php if (!$logado): ?>
            <div class="aviso">Você precisa estar logado para acessar o seu carrinho.</div>
            <div class="btn-container">
                <a href="entrar" class="btn" id="entrar-btn">Entrar</a>
                <a href="cadastrar" class="btn" id="cadastrar-btn">Cadastrar</a>
            </div>
        <?php else: ?>

            <div class="carrinho-container">
                <h2 class="titulo-carrinho">Meu Carrinho</h2>

                <?php if (empty($carrinho)): ?>
                    <div class="carrinho-vazio">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <p>Seu carrinho está vazio</p>
                        <a href="/Medeiros-Moveis/produto?categoria=moveis" class="btn-voltar">Voltar às compras</a>
                    </div>

                <?php else: ?>
                    <div class="tabela-wrapper">
                        <table class="tabela-carrinho">
                            <thead>
                                <tr>
                                    <th>Imagem</th>
                                    <th>Produto</th>
                                    <th>Preço</th>
                                    <th>Qtde</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                foreach ($carrinho as $item):
                                    $subtotal = $item['preco'] * $item['quantidade'];
                                    $total += $subtotal;
                                ?>
                                    <tr>
                                        <td><img src="<?= htmlspecialchars($item['imagem']) ?>" class="img-produto"></td>
                                        <td><?= htmlspecialchars($item['nome']) ?></td>
                                        <td>R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
                                        <td><?= $item['quantidade'] ?></td>
                                        <td>R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
                                        <td>
                                            <form method="POST" action="src/Controller/Carrinho.php?action=remover"
                                                class="form-remover">
                                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                                <button class="btn-remover" title="Remover do carrinho">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="linha-total">
                                    <td colspan="4" class="text-end">Total:</td>
                                    <td>R$ <?= number_format($total, 2, ',', '.') ?></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="finalizar-container">
                        <button class="btn-finalizar">Finalizar Compra</button>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (isset($_GET['status']) && $_GET['status'] === 'add'): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Produto adicionado!',
            text: 'Ver seu carrinho ou continuar comprando?',
            showCancelButton: true,
            confirmButtonText: 'Ver Carrinho',
            cancelButtonText: 'Continuar',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'area-usuario.php';
            }
        });
    </script>

<?php elseif (isset($_GET['status']) && $_GET['status'] === 'remove'): ?>
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Produto removido do carrinho!',
            timer: 1500,
            showConfirmButton: false
        });
    </script>
<?php endif; ?>