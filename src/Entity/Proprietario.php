<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

#[ORM\Entity]
#[ORM\Table]
class Proprietario implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private DateTimeImmutable $criadoEm;

    #[ORM\OneToMany(mappedBy: 'proprietario', targetEntity: Investimento::class, cascade: ['persist'])]
    private Collection $investimentos;

    public function __construct(
        #[ORM\Column(length: 255)]
        private string $nome
    ) {
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

    public function adicionarInvestimentos(Collection $investimentos): self
    {
        foreach ($investimentos as $investimento) { {
                $this->investimentos->add($investimento);
                $investimento->setProprietrio($this);
            }
        }
        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return  [
            'id' => $this->id(),
            'nome' => $this->nome(),
            'criadoEm' => $this->criadoEm(),
            'investimentos' => $this->investimentos->map(function (Investimento $investimento){
                return [
                    'id' => $investimento->id(),
                    'criadoEm' => $investimento->criadoEm(),
                    'valorInicial' => $investimento->valorInicial(),
                    'saldo' => $investimento->saldo(),
                    'atualizadoEm' => $investimento->atualizadoEm()
                    
                    
                ];                                                                                                          
            })
        ];
            
    }
}                                   
