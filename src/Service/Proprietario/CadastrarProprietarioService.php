<?php

namespace App\Service\Proprietario;

use App\DTO\Proprietario\CadastrarProprietarioDTO;
use App\Entity\Proprietario;
use App\Repository\ProprietarioRepository;

class CadastrarProprietarioService
{
    public function __construct(
        private ProprietarioRepository $proprietarioRepository
    ) {
    }

    public function execute(CadastrarProprietarioDTO $proprietarioDTO): bool
    {
        try {
            
            $this->proprietarioRepository->add(new Proprietario($proprietarioDTO->nome()), true);

            return true;

        } catch (\Exception $e) {
            return false;
        }
    }
}
