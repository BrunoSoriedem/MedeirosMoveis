<?php

namespace App\Model;

use App\Core\Database;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]

class funcionarios
{
    #[Id]
    #[Column(type: "integer")]
    #[GeneratedValue(strategy: "AUTO")]
    private int $id;

    #[Column(type: "string", length: 100)]
    private string $name;

    #[Column(type: "string", length: 30)]
    private string $funcao;

    #[Column(type: "blob")]
    private string $diretorio_imagem;

    public function __construct(string $name, string $funcao, string $diretorio_imagem)
    {
        $this->name = $name;
        $this->funcao = $funcao;
        $this->diretorio_imagem = $diretorio_imagem;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFuncao(): string
    {
        return $this->funcao;
    }

    public function getDiretorioImagem(): string
    {
        return $this->diretorio_imagem;
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
