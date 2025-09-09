<?php

namespace App\Model;

use App\Core\Database;
use DateTime;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]

class ContasCadastradas
{
    #[Column, Id, GeneratedValue]
    private int $id;

    #[Column]
    private string $name;

    #[Column]
    private string $email;

    #[Column]
    private string $senha;

    #[Column]
    private DateTime $data_cadastro;

    #[Column]
    private string $perfil_Acesso;


    public function __construct(string $name, string $email, string $senha, DateTime $data_cadastro, string $perfil_Acesso)
    {
        $em = Database::getEntityManager();
        $this->name = $name;
        $this->email = $email;
        $this->senha = $senha;
        $this->data_cadastro = $data_cadastro;
        $this->perfil_Acesso = $perfil_Acesso;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function getDataCadastro(): DateTime
    {
        return $this->data_cadastro;
    }

    public function getPerfil(): string
    {
        return $this->perfil_Acesso;
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
        $repository = $em->getRepository(CContasCadastradas::class);
        return $repository->findAll();
    }

    public static function findByEmail(string $email): ContasCadastradas
    {
        $em = Database::getEntityManager();
        $repository = $em->getRepository(CContasCadastradas::class);
        return $repository->findBy(['email' => $email]);
    }

    public function login(): void {}
}
