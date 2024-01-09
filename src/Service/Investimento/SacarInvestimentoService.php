<?php

namespace App\Service\Investimento;

use App\DTO\Investimento\SacarInvestimentoDTO;
use App\Repository\InvestimentoRepository;

class SacarInvestimentoService
{
    public function __construct(
        private InvestimentoRepository $investimentoRepository
        
    ){   
    }

    public function execute(SacarInvestimentoDTO $sacarInvestimentoDTO): bool
        {
            try{
               $investimento = $this->investimentoRepository->find($sacarInvestimentoDTO->id());
                
                $this->investimentoRepository->remove($sacarInvestimentoDTO->id(), true);
            }catch (\Exception $e){
                return false;
            }
        } 
}
