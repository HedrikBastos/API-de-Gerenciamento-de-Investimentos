<?php

namespace App\Service\Investimento;

use App\Repository\InvestimentoRepository;
use App\DTO\Proprietario\CadastrarInvestimentoDTO;
use App\Entity\Investimento;
use DateTimeImmutable;

class CadastrarInvestimentoService
{
    public function __construct(
        private InvestimentoRepository $investimentoRepository
    ) {
    }

    public function execute(CadastrarInvestimentoDTO $investimentoDTO): bool
    {
        try {                             
            $dateTime  =  new DateTimeImmutable($investimentoDTO->criadoEm());
            $this->investimentoRepository->add(
                new Investimento(
                    $investimentoDTO->valorInicial(),
                    $dateTime
                ),
                true
            );

            return true;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
