<?php

namespace App\Model;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Model\EmailEnviados;

#[ORM\Entity(repositoryClass: "App\Repository\ContasCadastradasRepository")]
class ContasCadastradas
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    private int $id;

    #[ORM\Column(type: "string", length: 100)]
    private string $name;

    #[ORM\Column(type: "string", length: 150, unique: true)]
    private string $email;

    #[ORM\Column(length: 255)]
    private string $senha;

    #[ORM\Column(type: "datetime")]
    private DateTime $data_cadastro;

    #[ORM\Column(length: 50)]
    private string $perfil_Acesso;

    #[ORM\OneToMany(mappedBy: "conta", targetEntity: EmailEnviados::class, cascade: ["persist", "remove"], orphanRemoval: true)]
    private Collection $emails;

    #[ORM\OneToMany(mappedBy: "produto", targetEntity: ItensCarrinho::class, cascade: ["persist", "remove"], orphanRemoval: true)]
    private Collection $carrinhos;

    public function __construct()
    {
        $this->data_cadastro = new DateTime();
        $this->emails = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setNome(string $nome): void
    {
        $this->name = $nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function getDataCadastro(): DateTime
    {
        return $this->data_cadastro;
    }

    public function setDataCadastro(DateTime $data): void
    {
        $this->data_cadastro = $data;
    }

    public function getPerfil(): string
    {
        return $this->perfil_Acesso;
    }

    public function setPerfil(string $perfil): void
    {
        $this->perfil_Acesso = $perfil;
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
        return true;
    }

    public function getEmails(): Collection
    {
        return $this->emails;
    }

    public function addEmail(EmailEnviados $email): void
    {
        if (!$this->emails->contains($email)) {
            $this->emails->add($email);
            $email->setConta($this);
        }
    }

    public function removeEmail(EmailEnviados $email): void
    {
        if ($this->emails->removeElement($email)) {
            $email->setConta(null);
        }
    }
}
