<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Database;

$logado = isset($_SESSION['usuario_id']);
$conta = null;

if ($logado) {
    $em = Database::getEntityManager();
    $conta = $em->getRepository(\App\Model\ContasCadastradas::class)->find($_SESSION['usuario_id']);
}


?>

<link rel="stylesheet" href="css/contato.css">
<link rel="stylesheet" href="css/nav-footer.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<section id="section-email" data-aos="fade-up">
    <div class="contact-container">
        <div class="form-box">
            <h2 class="h2-form">dashboard</h2>
            <iframe class="mapa-embed"
                    src="http://localhost:3000/public/dashboard/c4e0da6d-de34-44b1-8244-f1732ca32a18"
                    width="100%" height="1000" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
        </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
