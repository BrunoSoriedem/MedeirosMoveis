<?php

namespace App\Model;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class EmailEnviados
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: "string", length: 100)]
    private string $name;

    #[ORM\Column(type: "string", length: 20)]
    private string $telefone;

    #[ORM\Column(type: "string", length: 150)]
    private string $email;

    #[ORM\Column(type: "string", length: 100)]
    private string $cidade;

    #[ORM\Column(type: "string", length: 100)]
    private string $formaEncontro;

    #[ORM\Column(type: "string", length: 100)]
    private string $assunto;

    #[ORM\Column(type: "text")]
    private string $mensagem;

    #[ORM\Column(type: "datetime")]
    private DateTime $data_envio;

    public function __construct(
        string $name,
        string $telefone,
        string $email,
        string $cidade,
        string $formaEncontro,
        string $assunto,
        string $mensagem,
        DateTime $data_envio
    ) {
        $this->name = $name;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->cidade = $cidade;
        $this->formaEncontro = $formaEncontro;
        $this->assunto = $assunto;
        $this->mensagem = $mensagem;
        $this->data_envio = $data_envio;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getTelefone(): string
    {
        return $this->telefone;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getCidade(): string
    {
        return $this->cidade;
    }
    public function getFormaEncontro(): string
    {
        return $this->formaEncontro;
    }
    public function getAssunto(): string
    {
        return $this->assunto;
    }
    public function getMensagem(): string
    {
        return $this->mensagem;
    }
    public function getDataEnvio(): DateTime
    {
        return $this->data_envio;
    }
}
