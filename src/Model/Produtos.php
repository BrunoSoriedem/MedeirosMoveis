<?php

namespace App\Model;

use App\Core\Database;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: \App\Repository\ProdutoRepository::class)]
#[ORM\Table(name: "produtos")]
class Produtos
{
    #[Id]
    #[Column(type: "integer")]
    #[GeneratedValue(strategy: "AUTO")]
    private int $id;

    #[Column(type: "string", length: 255)]
    private string $descricao;

    #[Column(type: "decimal", precision: 10, scale: 2)]
    private float $precoAV;

    #[Column(type: "decimal", precision: 10, scale: 2)]
    private float $precoAP;

    #[Column(type: "decimal", precision: 10, scale: 2)]
    private float $qtdeDisp;

    #[Column(type: "string", length: 150)]
    private string $moveis;

    #[Column(type: "string", length: 150)]
    private string $planejados;

    #[Column(type: "string", length: 150)]
    private string $estofados;

    #[Column(type: "string", length: 150)]
    private string $eletros;

    #[Column(type: "string", length: 150)]
    private string $maisVendido;

    #[Column(type: "string", length: 150)]
    private string $novidade;

    #[Column(type: "string", length: 255)]
    private string $diretorio_imagem;

    #[Column(type: "datetime")]
    private DateTime $data_cadastro;

    // #[ORM\OneToMany(mappedBy: "conta", targetEntity: Carrinho::class, cascade: ["persist", "remove"], orphanRemoval: true)]
    // private Collection $carrinhos;

    public function __construct(
        string $descricao,
        float $precoAV,
        float $precoAP,
        float $qtdeDisp,
        string $moveis,
        string $planejados,
        string $estofados,
        string $eletros,
        string $maisVendido,
        string $novidade,
        string $diretorio_imagem,
        DateTime $data_cadastro
    ) {
        $this->descricao = $descricao;
        $this->precoAV = $precoAV;
        $this->precoAP = $precoAP;
        $this->qtdeDisp = $qtdeDisp;
        $this->moveis = $moveis;
        $this->planejados = $planejados;
        $this->estofados = $estofados;
        $this->eletros = $eletros;
        $this->maisVendido = $maisVendido;
        $this->novidade = $novidade;
        $this->diretorio_imagem = $diretorio_imagem;
        $this->data_cadastro = $data_cadastro;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getPrecoAV(): float
    {
        return $this->precoAV;
    }

    public function getPrecoAP(): float
    {
        return $this->precoAP;
    }

    public function getqtdeDisp(): float
    {
        return $this->qtdeDisp;
    }

    public function getMoveis(): string
    {
        return $this->moveis;
    }

    public function getPlanejados(): string
    {
        return $this->planejados;
    }

    public function getEstofados(): string
    {
        return $this->estofados;
    }

    public function getEletros(): string
    {
        return $this->eletros;
    }

    public function getMaisVendido(): string
    {
        return $this->maisVendido;
    }

    public function getNovidade(): string
    {
        return $this->novidade;
    }

    public function getDiretorioImagem(): string
    {
        return $this->diretorio_imagem;
    }

    public function getDataCadastro(): DateTime
    {
        return $this->data_cadastro;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function setPrecoAV(float $precoAV): void
    {
        $this->precoAV = $precoAV;
    }

    public function setPrecoAP(float $precoAP): void
    {
        $this->precoAP = $precoAP;
    }

    public function setQtdeDisp(float $qtdeDisp): void
    {
        $this->qtdeDisp = $qtdeDisp;
    }

    public function setMoveis(string $moveis): void
    {
        $this->moveis = $moveis;
    }

    public function setPlanejados(string $planejados): void
    {
        $this->planejados = $planejados;
    }

    public function setEstofados(string $estofados): void
    {
        $this->estofados = $estofados;
    }

    public function setEletros(string $eletros): void
    {
        $this->eletros = $eletros;
    }

    public function setMaisVendido(string $maisVendido): void
    {
        $this->maisVendido = $maisVendido;
    }

    public function setNovidade(string $novidade): void
    {
        $this->novidade = $novidade;
    }

    public function setDiretorioImagem(string $diretorio_imagem): void
    {
        $this->diretorio_imagem = $diretorio_imagem;
    }

    public function setDataCadastro(DateTime $data_cadastro): void
    {
        $this->data_cadastro = $data_cadastro;
    }

    public function setCarrinhos(Collection $carrinhos): void
    {
        $this->carrinhos = $carrinhos;
    }

    public static function findById($id): ?self
    {
        $em = Database::getEntityManager();
        return $em->find(self::class, $id);
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
        $repository = $em->getRepository(Produtos::class);
        return $repository->findAll();
    }
}
