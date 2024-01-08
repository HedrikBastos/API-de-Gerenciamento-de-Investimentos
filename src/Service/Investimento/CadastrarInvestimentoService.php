<?php

namespace App\Service\Investimento;

use DateTimeImmutable;
use App\Entity\Investimento;
use App\Repository\InvestimentoRepository;
use App\Repository\ProprietarioRepository;
use App\DTO\Proprietario\CadastrarInvestimentoDTO;

class CadastrarInvestimentoService
{
    public function __construct(
        private InvestimentoRepository $investimentoRepository,
        private ProprietarioRepository $proprietarioRepository
    ) {
    }

    public function execute(CadastrarInvestimentoDTO $investimentoDTO, int $proprietarioId): bool
    {
        if ($investimentoDTO->valorInicial() <= 0) {
            throw new \InvalidArgumentException("O valor do investimento não pode ser negativo.");
        }

        try {
                
            $proprietario = $this->proprietarioRepository->find($proprietarioId);                       
            $dateTime  =  new DateTimeImmutable($investimentoDTO->criadoEm());

            $this->investimentoRepository->add(
                new Investimento(
                    $investimentoDTO->valorInicial(),
                    $dateTime,
                    $proprietario,
                ),
                true
            );
            
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
