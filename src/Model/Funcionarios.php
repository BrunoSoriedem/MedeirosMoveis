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
    #[Column, Id, GeneratedValue]
    private int $id;

    #[Column]
    private string $name;

    #[Column]
    private string $funcao;

    #[Column]
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
