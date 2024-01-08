<?php

namespace App\Service\Investimento;

use App\Repository\InvestimentoRepository;
use DateTime;

class AtualizaGanhoInvestimentoService
{
    public function __construct(
        private InvestimentoRepository $investimentoRepository
    ) {
    }

    public function execute(): void
    {
        $dataAtual = new \DateTime();

        $investimentos =  $this->investimentoRepository->findAll();

        foreach ($investimentos as $investimento) {
            $atualizadoEm = $investimento->atualizadoEm();

            if ($atualizadoEm != null) {
                $intervalo =  $this->calcularIntervaloMeses($dataAtual, $atualizadoEm);

                if ($intervalo->m >=  30) {
                    $investimento->setAtualizadoEm($dataAtual);
                    $atualizaSaldoInvestimento = $this->calculaGanhoInvestimento($investimento->saldo());
                    $investimento->setSaldo($atualizaSaldoInvestimento);
                    $this->investimentoRepository->add($investimento, true);
                }
            }

            if ($atualizadoEm == null) {
                $CriadoEm = $investimento->criadoEm();
                $intervalo = $this->calcularIntervaloMeses($dataAtual, $CriadoEm);

                for($i=1; $i<= $intervalo->m; $i++ ) {
                    $atualizaSaldoInvestimento = $this->calculaGanhoInvestimento($investimento->saldo());
                    $investimento->setSaldo($atualizaSaldoInvestimento); 
                }
                $investimento->setAtualizadoEm($dataAtual);
                $this->investimentoRepository->add($investimento, true);
            }
        }
    }

    private function calcularIntervaloMeses($dataAtual, $atualizadoEm): mixed
    {
        $intervalo = $dataAtual->diff($atualizadoEm);

        return $intervalo;
    }

    private function calculaGanhoInvestimento($saldo): float
    {
        $saldo += $saldo * 0.0052;

        return $saldo;
    }
}
