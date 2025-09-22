<?php

namespace App\Model;

use App\Core\Database;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "funcionarios")]
class Funcionarios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 100)]
    private string $name;

    #[ORM\Column(type: "string", length: 30)]
    private string $funcao;

    #[ORM\Column(type: "string", length: 255)]
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
        return $em->getRepository(self::class)->findAll();
    }
}
