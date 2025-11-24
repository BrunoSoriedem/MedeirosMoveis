<?php

namespace App\Model;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: \App\Repository\VendaRepository::class)]
#[ORM\Table(name: "vendas")]
class Venda
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id_venda;

    #[ORM\ManyToOne(targetEntity: ContasCadastradas::class)]
    #[ORM\JoinColumn(name: "conta_id", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    private ?ContasCadastradas $conta = null;

    #[ORM\Column(type: "datetime")]
    private DateTime $data_venda;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private float $valor_total = 0.00;

    #[ORM\OneToMany(mappedBy: "venda", targetEntity: ItensVenda::class, cascade: ["persist", "remove"], orphanRemoval: true)]
    private Collection $itens;

    public function __construct()
    {
        $this->data_venda = new DateTime();
        $this->itens = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id_venda;
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

    public function getDataVenda(): DateTime
    {
        return $this->data_venda;
    }

    public function setDataVenda(DateTime $data): self
    {
        $this->data_venda = $data;
        return $this;
    }

    public function getItens(): Collection
    {
        return $this->itens;
    }

    public function addItem(ItensVenda $item): self
    {
        if (!$this->itens->contains($item)) {
            $this->itens[] = $item;
            $item->setVenda($this);
        }
        return $this;
    }

    public function setItens($itens): void
    {
        $this->itens = $itens;
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->itens as $item) {
            $total += $item->getSubtotal();
        }
        return $total;
    }

    public function setValorTotal(float $valor): self
    {
        $this->valor_total = $valor;
        return $this;
    }
}
