<?php

namespace App\DTO\Proprietario;

use DateTimeImmutable;

class CadastrarInvestimentoDTO
{
    private int $valorInicial;

    private string $criadoEm;
     
    public function valorInicial(): int
    {
        return $this->valorInicial;
    }

    public function setValorInicial($valorInicial): self
    {
        $this->valorInicial = $valorInicial;

        return $this;
    }

    public function criadoEm(): string
    {
        return $this->criadoEm;
    }

    public function setCriadoEm($criadoEm): self
    {
        $this->criadoEm = $criadoEm;

        return $this;
    }

}
