<?php

namespace App\Model;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\ItensVendaRepository::class)]
#[ORM\Table(name: "itens_venda")]
class ItensVenda
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Venda::class, inversedBy: "itens")]
    #[ORM\JoinColumn(name: "venda_id", referencedColumnName: "id_venda", nullable: false, onDelete: "CASCADE")]
    private ?Venda $venda = null;

    #[ORM\ManyToOne(targetEntity: Produtos::class)]
    #[ORM\JoinColumn(name: "produto_id", referencedColumnName: "id", nullable: false)]
    private ?Produtos $produto = null;

    #[ORM\Column(type: "integer")]
    private int $quantidade;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private float $preco_unitario;

    public function getId(): int
    {
        return $this->id;
    }

    public function getVenda(): ?Venda
    {
        return $this->venda;
    }

    public function setVenda(?Venda $venda): self
    {
        $this->venda = $venda;
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
        return $this->preco_unitario;
    }

    public function setPrecoUnitario(float $preco): self
    {
        $this->preco_unitario = $preco;
        return $this;
    }

    public function getSubtotal(): float
    {
        return $this->quantidade * $this->preco_unitario;
    }
}
