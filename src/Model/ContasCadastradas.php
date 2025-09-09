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
    #[Id]
    #[Column(type: "integer")]
    #[GeneratedValue(strategy: "AUTO")]
    private int $id;

    #[Column(type: "string", length: 100)]
    private string $name;

    #[Column(type: "string", length: 150, unique: true)]
    private string $email;

    #[Column(length: 255)]
    private string $senha;

    #[Column(type: "datetime")]
    private DateTime $data_cadastro;

    #[Column(length: 50)]
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
        $repository = $em->getRepository(ContasCadastradas::class);
        return $repository->findAll();
    }

    public static function findByEmail(string $email): ?ContasCadastradas
    {
        $em = Database::getEntityManager();
        $repository = $em->getRepository(ContasCadastradas::class);
        return $repository->findOneBy(['email' => $email]);
    }

    public function login(string $senhaDigitada): bool
    {
        return password_verify($senhaDigitada, $this->senha);
    }
}
