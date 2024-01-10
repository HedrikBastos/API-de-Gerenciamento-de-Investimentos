<?php

namespace App\Controller\Proprietario\Investimento\Sacar;

use Symfony\Component\Routing\Attribute\Route;
use App\Service\Investimento\SacarInvestimentoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

#[Route('/proprietario/{proprietarioId}/investimento/{investimentoId}/sacar', name: 'investimento_sacar', methods: ['GET'])]
class Controller extends AbstractController
{
    public function __invoke(
        int $proprietarioId,
        int $investimentoId,
        SacarInvestimentoService $sacarInvestimentoService,
    ): Response {
        $executaSacaInvestimentoService = $sacarInvestimentoService->execute($proprietarioId, $investimentoId);

        return $this->json([
            'SaldoInvestimento' => $executaSacaInvestimentoService
        ]);
    }
}
