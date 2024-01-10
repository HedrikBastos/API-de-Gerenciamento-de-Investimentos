<?php

namespace App\Service\Investimento;

use Brick\Math\BigDecimal;
use App\Entity\Investimento;
use Brick\Math\RoundingMode;
use DateInterval;

class AplicarImpostoInvestimentoService
{

    public function execute(Investimento $investimento)
    {

        $tempoInvestido = $this->verificarTempoInvestimento($investimento->criadoEm());

        $saldoLiquido = $this->verificarImpostoInvestimento($investimento, $tempoInvestido);

        return $saldoLiquido;
    }

    private function verificarTempoInvestimento($criadoEm): DateInterval
    {

        $dataAtual = new \DateTime();

        $tempoInvestido = $dataAtual->diff($criadoEm);

        return $tempoInvestido;
    }

    private function verificarImpostoInvestimento(Investimento $investimento, $tempoInvestido): string
    {

        if ($tempoInvestido->y < 1) {

            return $this->aplicarImposto($investimento, 0.225);
        }

        if ($tempoInvestido->y >= 1 && $tempoInvestido->y <= 2) {

            return $this->aplicarImposto($investimento, 0.185);

        }

        return $this->aplicarImposto($investimento, 0.15);

    }

    private function aplicarImposto(Investimento $investimento, $imposto)
    {
        $lucro = $investimento->saldo() - $investimento->valorInicial();
        $lucro = BigDecimal::of($lucro);
        $imposto = BigDecimal::of($imposto);
        $aplicarImposto = $lucro->minus($lucro->multipliedBy($imposto));
        $impostoAplicado = $aplicarImposto->toScale(2, RoundingMode::UP);
        $investimento->setSaldo($impostoAplicado);
        $saldoLiquido = $investimento->valorInicial() + $investimento->saldo();

        return $saldoLiquido;
    }
}
