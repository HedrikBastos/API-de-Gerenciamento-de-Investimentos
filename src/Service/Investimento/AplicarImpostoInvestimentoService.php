<?php

namespace App\Service\Investimento;

use Brick\Math\BigDecimal;
use App\Entity\Investimento;
use Brick\Math\RoundingMode;
use App\Repository\InvestimentoRepository;

class AplicarImpostoInvestimentoService
{
    public function __construct(
        private InvestimentoRepository $investimentoRepository
    ) {
    }

    public function execute($id)
    {
        $investimento = $this->investimentoRepository->find($id);
        $tempoInvestido = $this->verificarTempoInvestimento($investimento->criadoEm());
        $impostoAplicado = $this->verificarImpostoInvestimento($investimento,$tempoInvestido);

        
    }

    private function verificarTempoInvestimento($criadoEm)
    {
        $dataAtual = new \DateTime();

        $tempoInvestido = $dataAtual->diff($criadoEm);

        return $tempoInvestido;
    }

    private function verificarImpostoInvestimento(Investimento $investimento, $tempoInvestido )
    {
        if($tempoInvestido->y < 1){
            $lucro = $investimento->saldo() - $investimento->valorInicial();
            $lucro = BigDecimal::of($lucro);
            $imposto = BigDecimal::of(0.225);
            $aplicarImposto = $lucro->plus($lucro->multipliedBy($imposto));
            $impostoAplicado = $aplicarImposto->toScale(2,RoundingMode::UP);

            return $impostoAplicado;
        }

    }
}
