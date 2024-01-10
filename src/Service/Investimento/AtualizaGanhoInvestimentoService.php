<?php

namespace App\Service\Investimento;

use Brick\Math\BigDecimal;
use Brick\Math\RoundingMode;
use App\Repository\InvestimentoRepository;

class AtualizaGanhoInvestimentoService
{
    public function __construct(
        private InvestimentoRepository $investimentoRepository
    ) {
    }

    public function execute(\Datetime $dataAtual): void
    {
        $investimentos =  $this->investimentoRepository->findAll();

        foreach ($investimentos as $investimento) {
            $atualizadoEm = $investimento->atualizadoEm();

            if ($atualizadoEm !== null) {
                $mesesAcumulados =  $this->calcularIntervaloMeses($dataAtual, $atualizadoEm);

                if ($mesesAcumulados >= 1) {
                    $investimento->setAtualizadoEm($dataAtual);
                    $atualizaSaldoInvestimento = $this->calcularGanhosInvestimento($investimento->saldo());
                    $investimento->setSaldo($atualizaSaldoInvestimento);
                    $this->investimentoRepository->add($investimento, false);
                }

                continue;
            }

            $criadoEm = $investimento->criadoEm();
            $mesesAcumulados = $this->calcularIntervaloMeses($dataAtual, $criadoEm);

            if ($mesesAcumulados)
                for ($i = 1; $i <= $mesesAcumulados; $i++) {
                    $atualizaSaldoInvestimento = $this->calcularGanhosInvestimento($investimento->saldo());
                    $investimento->setSaldo($atualizaSaldoInvestimento);
                }
            $investimento->setAtualizadoEm($dataAtual);
            $this->investimentoRepository->add($investimento, false);
        }

        $this->investimentoRepository->flush();
    }

    private function calcularIntervaloMeses($dataAtual, $dataEntrada): int
    {
        $intervalo = $dataAtual->diff($dataEntrada);

        if ($intervalo->y == 0) {
            $mesesAcumulados = $intervalo->m;
        }

        if ($intervalo->y >= 1) {
            $mesesAcumulados = $intervalo->y * 12;
            $mesesAcumulados += $intervalo->m;
        }

        return $mesesAcumulados;
    }

    private function calcularGanhosInvestimento($saldo)
    {
        $saldo = BigDecimal::of($saldo);
        $juros = BigDecimal::of(0.0052);
        $saldo = $saldo->plus($saldo->multipliedBy($juros));
        $saldo = $saldo->toScale(2, RoundingMode::UP);

        return $saldo;
    }
}
