<?php

namespace App\Controller;

use App\Core\Database;
use App\Model\EmailEnviados;
use App\Repository\EmailEnviadosRepository;
use App\Services\MailerService;
use DateTime;
use Exception;

class EmailController
{
    private EmailEnviadosRepository $repository;
    private MailerService $mailer;

    public function __construct()
    {
        $this->repository = new EmailEnviadosRepository();
        $this->mailer = new MailerService();
    }

    public function salvar(array $dados, $conta = null): array
    {
        try {
            $emailEnviado = new EmailEnviados(
                $dados['Nome'],
                $dados['Telefone'],
                $dados['Email'],
                $dados['Cidade'],
                $dados['Categoria'],
                $dados['Assunto'],
                $dados['Mensagem'],
                new DateTime('now', new \DateTimeZone('America/Sao_Paulo'))
            );

            $this->repository->save($emailEnviado);

            $body = "
                <strong>Nome:</strong> {$dados['Nome']}<br>
                <strong>Telefone:</strong> {$dados['Telefone']}<br>
                <strong>Email:</strong> {$dados['Email']}<br>
                <strong>Cidade:</strong> {$dados['Cidade']}<br>
                <strong>Como nos encontrou:</strong> {$dados['Categoria']}<br>
                <strong>Mensagem:</strong><br>" . nl2br($dados['Mensagem']);

            $this->mailer->sendMail(
                $dados['Email'],
                $dados['Nome'],
                'brunorafamed.com@gmail.com',
                'Responsável',
                "Novo contato: {$dados['Assunto']}",
                $body
            );

            return ['success' => true, 'message' => 'Mensagem salva e enviada com sucesso'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Erro ao processar a mensagem'];
        }
    }
}
