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

    public function __construct() {}

    public function setNome(string $nome): void
    {
        $this->name = $nome;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function setSenha(string $senha): void
    {
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }
    public function setDataCadastro(DateTime $data): void
    {
        $this->data_cadastro = $data;
    }
    public function setPerfil(string $perfil): void
    {
        $this->perfil_Acesso = $perfil;
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

    public static function verificarSenha(string $email, string $senha): ?self
    {
        $em = Database::getEntityManager();
        $usuario = $em->getRepository(self::class)->findOneBy(['email' => $email]);

        if (!$usuario) {
            return null;
        }

        if (password_verify($senha, $usuario->getSenha())) {
            return $usuario;
        }

        return null;
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

    public static function findById(int $id): ?ContasCadastradas
    {
        $em = Database::getEntityManager();
        $repository = $em->getRepository(ContasCadastradas::class);
        return $repository->find($id);
    }

    public function login(string $senhaDigitada): bool
    {
        return password_verify($senhaDigitada, $this->senha);
    }

    public static function senhaValida(string $senha): bool
    {
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,16}$/', $senha);
    }

    public function alterarSenha(string $senhaAtual, string $novaSenha): bool
    {
        if (!password_verify($senhaAtual, $this->senha)) {
            return false;
        }

        $this->senha = password_hash($novaSenha, PASSWORD_DEFAULT);

        $em = Database::getEntityManager();
        $em->persist($this);
        $em->flush();

        return true;
    }
}
