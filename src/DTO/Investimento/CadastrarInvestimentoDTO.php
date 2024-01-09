<?php

namespace App\DTO\Investimento;

class CadastrarInvestimentoDTO
{
    private string $valorInicial;

    private string $criadoEm;
     
    public function valorInicial(): string
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
