<?php

namespace App\Service\Proprietario;

use App\Entity\Proprietario;
use App\Repository\InvestimentoRepository;
use App\Repository\ProprietarioRepository;

class BuscarProprietarioService
{
    public function  __construct(
        private ProprietarioRepository $proprietarioRepository,
        private InvestimentoRepository $investimentoRepository
    ){  
    }

    public function execute(int $proprietarioId): Proprietario
    {
        try {
           $proprietario = $this->proprietarioRepository->find($proprietarioId);

            return $proprietario;
            
        } catch (\Exception $e) {
            return false;       
        }
    }
}
