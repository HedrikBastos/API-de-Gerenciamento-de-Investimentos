<?php

namespace App\Service\Investimento;

use App\Repository\ProprietarioRepository;

class SacarInvestimentoService
{
    public function __construct(
        private ProprietarioRepository $proprietarioRepository,
        private AplicarImpostoInvestimentoService $aplicarImpostoImvestimentoService

    ) {
    }

    public function execute(int $proprietarioId, int $investimentoId): string
    {
        try {
            $proprietario = $this->proprietarioRepository->find($proprietarioId);
            $investimento = $proprietario->investimento($investimentoId);                                           
            $valorLiquido =  $this->aplicarImpostoImvestimentoService->execute($investimento);

            return $valorLiquido;
        } catch (\Exception $e) {
            return false;
        }
    }
}
