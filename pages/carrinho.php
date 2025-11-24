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
    $carrinho = CarrinhoController::listarRetorno();
}

$total = 0;
foreach ($carrinho as $item) {
    $total += ($item['preco'] * $item['quantidade']);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(16));
}
$csrfToken = $_SESSION['csrf_token'];
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
                                    <th></th>
                                    <th>Imagem</th>
                                    <th>Produto</th>
                                    <th>Preço</th>
                                    <th>Qtde</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($carrinho as $item):
                                    $subtotal = $item['preco'] * $item['quantidade'];
                                ?>
                                    <tr id="item-row-<?= htmlspecialchars($item['id']) ?>"
                                        data-id="<?= htmlspecialchars($item['id']) ?>">
                                        <td><input type="checkbox" class="chk-produto" value="<?= htmlspecialchars($item['id']) ?>">
                                        </td>
                                        <td><img src="<?= htmlspecialchars($item['imagem']) ?>" class="img-produto"
                                                alt="<?= htmlspecialchars($item['nome']) ?>"></td>
                                        <td><?= htmlspecialchars($item['nome']) ?></td>
                                        <td class="preco-unit">R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
                                        <td class="qtde"><?= (int)$item['quantidade'] ?></td>
                                        <td class="subtotal" data-preco="<?= number_format($subtotal, 2, '.', '') ?>">R$
                                            <?= number_format($subtotal, 2, ',', '.') ?></td>
                                        <td>
                                            <button class="btn-remover" data-id="<?= htmlspecialchars($item['id']) ?>"
                                                title="Remover do carrinho">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="linha-total">
                                    <td colspan="5" class="text-end">Total:</td>
                                    <td id="total-geral" data-total="<?= number_format($total, 2, '.', '') ?>">R$
                                        <?= number_format($total, 2, ',', '.') ?></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="finalizar-container d-flex align-items-center gap-3">
                        <div id="box-selecionados" class="box-selecionados">
                            Selecionados: 0 itens — Total: R$ 0,00
                        </div>
                        <button id="btn-finalizar" class="btn-finalizar btn btn-success" disabled>Finalizar Compra</button>
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
<?php endif; ?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const csrfToken = '<?= $csrfToken ?>';

        function formatBR(value) {
            return value.toLocaleString('pt-BR', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }

        function parsePrecoAttr(str) {
            const v = parseFloat(str);
            return isNaN(v) ? 0 : v;
        }

        function atualizarTotalGeral() {
            let total = 0;
            document.querySelectorAll('td[data-preco]').forEach(td => {
                const preco = parsePrecoAttr(td.getAttribute('data-preco'));
                total += preco;
            });

            const totalTd = document.getElementById('total-geral');
            if (totalTd) {
                totalTd.innerText = 'R$ ' + formatBR(total);
                totalTd.setAttribute('data-total', total.toFixed(2));
            }
        }

        function atualizarSelecionados() {
            const checkboxes = document.querySelectorAll('.chk-produto:checked');
            let qtd = 0;
            let total = 0;

            checkboxes.forEach(chk => {
                const linha = chk.closest('tr');
                if (!linha) return;
                const tdPreco = linha.querySelector('td[data-preco]');
                if (!tdPreco) return;
                const preco = parsePrecoAttr(tdPreco.getAttribute('data-preco'));
                total += preco;
                qtd++;
            });

            const box = document.getElementById('box-selecionados');
            if (box) {
                box.innerText = `Selecionados: ${qtd} item(s) — Total: R$ ${formatBR(total)}`;
            }

            const btnFinalizar = document.getElementById('btn-finalizar');
            if (btnFinalizar) {
                btnFinalizar.disabled = (qtd === 0);
            }
        }

        function verificarCarrinhoVazio() {
            const linhas = document.querySelectorAll('.tabela-carrinho tbody tr');
            if (!linhas.length) {
                window.location.reload();
            }
        }

        document.querySelectorAll('.chk-produto').forEach(chk => {
            chk.addEventListener('change', () => {
                atualizarSelecionados();
            });
        });

        async function removerUnidade(idProduto, botao) {
            const formData = new FormData();
            formData.append('id', idProduto);
            formData.append('csrf_token', csrfToken);

            try {
                const response = await fetch('src/Controller/Carrinho.php?action=remover', {
                    method: 'POST',
                    body: formData,
                    credentials: 'same-origin'
                });

                const data = await response.json();
                return data;
            } catch (err) {
                return {
                    sucesso: false,
                    erro: 'Falha na requisição.'
                };
            }
        }

        document.querySelectorAll('.btn-remover').forEach(botao => {
            botao.addEventListener('click', async (e) => {
                e.preventDefault();
                const idProduto = botao.dataset.id;

                const confirm = await Swal.fire({
                    title: 'Remover produto?',
                    text: 'Deseja remover 1 unidade deste produto?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sim, remover',
                    cancelButtonText: 'Cancelar'
                });

                if (!confirm.isConfirmed) return;

                Swal.fire({
                    title: 'Removendo...',
                    didOpen: () => {
                        Swal.showLoading();
                    },
                    allowOutsideClick: false
                });

                const data = await removerUnidade(idProduto, botao);

                Swal.close();

                if (data.sucesso) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Feito!',
                        text: data.mensagem,
                        timer: 1200,
                        showConfirmButton: false
                    });

                    const linha = document.getElementById('item-row-' + idProduto);
                    if (linha) {
                        const qtdeEl = linha.querySelector('.qtde');
                        const subtotalEl = linha.querySelector('.subtotal');

                        let novaQtd = null;
                        if (data.novaQuantidade !== undefined) {
                            novaQtd = parseInt(data.novaQuantidade, 10);
                        } else if (qtdeEl) {
                            novaQtd = parseInt(qtdeEl.innerText, 10) - 1;
                        }

                        if (novaQtd !== null && novaQtd > 0) {
                            if (qtdeEl) qtdeEl.innerText = novaQtd;
                            const precoUnitStr = linha.querySelector('.preco-unit') ? linha
                                .querySelector('.preco-unit').innerText.replace(/[^\d,.-]/g, '')
                                .replace(',', '.') : null;
                            let precoUnit = precoUnitStr ? parseFloat(precoUnitStr) : null;

                            if (!isNaN(precoUnit) && subtotalEl) {
                                const novoSubtotal = precoUnit * novaQtd;
                                subtotalEl.setAttribute('data-preco', novoSubtotal.toFixed(2));
                                subtotalEl.innerText = 'R$ ' + formatBR(novoSubtotal);
                            }
                        } else {
                            linha.remove();
                        }
                    }

                    atualizarSelecionados();
                    atualizarTotalGeral();
                    verificarCarrinhoVazio();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: data.erro || 'Não foi possível remover o produto.'
                    });
                }
            });
        });

        document.getElementById('btn-finalizar').addEventListener('click', async () => {
            const selecionados = Array.from(document.querySelectorAll('.chk-produto:checked')).map(
                chk => chk.value);

            if (selecionados.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Nenhum produto selecionado',
                    text: 'Selecione pelo menos um produto para finalizar a compra.'
                });
                return;
            }

            const confirm = await Swal.fire({
                title: 'Confirmar venda?',
                text: `Você selecionou ${selecionados.length} produto(s). Deseja finalizar?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sim, finalizar',
                cancelButtonText: 'Cancelar'
            });

            if (!confirm.isConfirmed) return;

            Swal.fire({
                title: 'Finalizando compra...',
                didOpen: () => Swal.showLoading(),
                allowOutsideClick: false
            });

            try {
                const formData = new FormData();
                formData.append('produtos', JSON.stringify(selecionados));
                formData.append('csrf_token', csrfToken);

                const response = await fetch('src/Controller/Venda.php?action=finalizar', {
                    method: 'POST',
                    body: formData,
                    credentials: 'same-origin'
                });

                const data = await response.json();
                Swal.close();

                if (data.sucesso) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Venda Finalizada com Sucesso!',
                        text: data.mensagem,
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        selecionados.forEach(id => {
                            const linha = document.getElementById('item-row-' + id);
                            if (linha) linha.remove();
                        });

                        atualizarSelecionados();
                        atualizarTotalGeral();
                        verificarCarrinhoVazio();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: data.erro || 'Não foi possível finalizar a venda.'
                    });
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: 'Falha na requisição.'
                });
            }
        });

        atualizarSelecionados();
        atualizarTotalGeral();
    });
</script>