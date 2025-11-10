<?php

namespace App\Model;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\ItensCarrinhoRepository::class)]
#[ORM\Table(name: "itens_carrinho")]
class ItensCarrinho
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: ContasCadastradas::class, inversedBy: "itensCarrinho")]
    #[ORM\JoinColumn(name: "conta_id", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    private ?ContasCadastradas $conta = null;

    #[ORM\ManyToOne(targetEntity: Produtos::class, inversedBy: "itensCarrinho")]
    #[ORM\JoinColumn(name: "produto_id", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    private ?Produtos $produto = null;

    #[ORM\Column(type: "integer")]
    private int $quantidade = 1;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private float $preco_unitario = 0.00;

    #[ORM\Column(type: "datetime")]
    private DateTime $data_adicionado;

    public function __construct()
    {
        $this->data_adicionado = new DateTime();
    }

    // getters / setters

    public function getId(): int
    {
        return $this->id;
    }

    public function getConta(): ?ContasCadastradas
    {
        return $this->conta;
    }

    public function setConta(?ContasCadastradas $conta): self
    {
        $this->conta = $conta;
        return $this;
    }

    public function getProduto(): ?Produtos
    {
        return $this->produto;
    }

    public function setProduto(?Produtos $produto): self
    {
        $this->produto = $produto;
        return $this;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade): self
    {
        $this->quantidade = $quantidade;
        return $this;
    }

    public function getPrecoUnitario(): float
    {
        return (float) $this->preco_unitario;
    }

    public function setPrecoUnitario(float $preco): self
    {
        $this->preco_unitario = $preco;
        return $this;
    }

    public function getDataAdicionado(): DateTime
    {
        return $this->data_adicionado;
    }

    public function setDataAdicionado(DateTime $data): self
    {
        $this->data_adicionado = $data;
        return $this;
    }

    public function getTotalItem(): float
    {
        return $this->quantidade * (float)$this->preco_unitario;
    }
}
