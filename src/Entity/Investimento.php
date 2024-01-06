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

    #[ManyToOne(inversedBy:'investimentos')]
    #[ORM\JoinColumn(nullable:false)]
    private Proprietario $proprietario;

    #[ORM\Column]
    private int $valorInicial;

    #[ORM\Column]
    private int $saldo;

    #[ORM\Column]
    private DateTimeImmutable $criadoEm;

    public function id(): int
    {
        return $this->id;
    }

    public function valorInicial():int
    {
        return $this->valorInicial;
    }
 
    public function setValorInicial(int $valorInicial): self
    {
        $this->valorInicial = $valorInicial;

        return $this;
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

    public function setCriadoEm(DateTimeImmutable $criadoEm): self
    {
        $this->criadoEm = $criadoEm;

        return $this;
    }
}
