<?php

namespace App\Entity;

use Brick\Math\BigDecimal;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;


#[ORM\Entity]
#[ORM\Table]
class Investimento
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(nullable:true)]                 
    private ?string $saldo = null;

    #[ORM\Column(nullable:true)]                 
    private ?\DateTime $atualizadoEm = null;

    public function __construct(
        #[ORM\Column]
        private string $valorInicial,

        #[ORM\Column]
        private DateTimeImmutable $criadoEm,

        #[ManyToOne(inversedBy:'investimentos')]
        #[ORM\JoinColumn(nullable:false)]
        private Proprietario $proprietario
    ){   
        $this->saldo = $valorInicial;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function valorInicial(): string
    {
        return $this->valorInicial;
    }

    public function saldo(): string
    {
        return $this->saldo;
    }

    public function setSaldo(BigDecimal $saldo): self
    {
        $this->saldo = $saldo;

        return $this;
    }

    public function criadoEm(): DateTimeImmutable
    {
        return $this->criadoEm;
    }

    public function setProprietario(Proprietario $proprietario): self
    {
        $this->proprietario = $proprietario;

        return $this;
    }

    public function atualizadoEm(): ? \DateTime
    {
        return $this->atualizadoEm;
    }

    public function setAtualizadoEm($atualizadoEm): self
    {
        $this->atualizadoEm = $atualizadoEm;

        return $this;
    }
}
