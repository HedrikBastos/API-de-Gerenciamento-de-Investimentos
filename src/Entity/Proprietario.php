<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
class Proprietario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private DateTimeImmutable $criadoEm;
    
    #[ORM\OneToMany(mappedBy:'proprietario', targetEntity:Investimento::class, cascade:['persist'])]
    private Collection $investimentos;

    public function __construct(
        #[ORM\Column(length:255)]
        private string $nome
    ){
        $this->criadoEm = new \DateTimeImmutable();
        $this->investimentos = new ArrayCollection();
    }

    public function id(): int
    {
        return $this->id;
    }

    public function nome(): string
    {
        return $this->nome;
    }

    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function criadoEm(): DateTimeImmutable
    {
        return $this->criadoEm;
    }

    public function investimentos(): Collection
    {
        return $this->investimentos;
    }
}
