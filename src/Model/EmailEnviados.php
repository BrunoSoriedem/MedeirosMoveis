<?php

namespace App\Model;

use App\Core\Database;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]

class EmailEnviados
{
    #[Id]
    #[Column(type: "integer")]
    #[GeneratedValue(strategy: "AUTO")]
    private int $id;

    #[Column(type: "string", length: 100)]
    private string $name;

    #[Column(type: "string", length: 20)]
    private string $telefone;

    #[Column(type: "string", length: 150, unique: true)]
    private string $email;

    #[Column(type: "string", length: 100)]
    private string $cidade;

    #[Column(type: "string", length: 100)]
    private string $formaEncontro;

    #[Column(type: "string", length: 100)]
    private string $assunto;

    #[Column(type: "text")]
    private string $mensagem;

    #[Column(type: "datetime")]
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

    public function save(): void
    {
        $em = Database::getEntityManager();
        $em->persist($this);
        $em->flush();
    }

    public static function findAll(): array
    {
        $em = Database::getEntityManager();
        $repository = $em->getRepository(EmailEnviados::class);
        return $repository->findAll();
    }
}
