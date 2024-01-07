<?php

namespace App\Entity;

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
    private ?int $saldo = null;

    public function __construct(
        #[ORM\Column]
        private int $valorInicial,

        #[ORM\Column]
        private DateTimeImmutable $criadoEm,

        #[ManyToOne(inversedBy:'investimentos')]
        #[ORM\JoinColumn(nullable:false)]
        private Proprietario $proprietario
    ){   
    }

    public function id(): int
    {
        return $this->id;
    }

    public function valorInicial():int
    {
        return $this->valorInicial;
    }

    public function saldo(): int
    {
        return $this->saldo;
    }

    public function setSaldo(int $saldo): self
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

}
