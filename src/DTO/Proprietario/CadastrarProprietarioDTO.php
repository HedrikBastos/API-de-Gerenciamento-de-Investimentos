<?php

namespace App\DTO\Proprietario;

use DateTimeImmutable;

class CadastrarProprietarioDTO
{
    private string $nome;
    
    public function nome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

}
