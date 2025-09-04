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
    #[Column, Id, GeneratedValue]
    private int $id;

    #[Column]
    private string $name;

    #[Column]
    private string $telefone;

    #[Column]
    private string $email;

    #[Column]
    private string $cidade;

    #[Column]
    private string $formaEncontro;

    #[Column]
    private string $assunto;

    #[Column]
    private string $mensagem;

    #[Column]
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
        $repository = $em->getRepository(ContasCadastradas::class);
        return $repository->findAll();
    }
}
