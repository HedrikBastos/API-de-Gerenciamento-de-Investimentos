<?php

namespace App\Controller\Proprietario\Investimento\Sacar;

use App\DTO\Investimento\SacarInvestimentoDTO;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\Investimento\SacarInvestimentoService;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/proprietario/investimento/sacar/{proprietarioId}',name:'investimento', methods: ['DELETE'])]
class Controller  extends AbstractController
{
    public function __invoke(
        #[MapRequestPayload]
        SacarInvestimentoDTO $sacarInvestimentoDTO,
        SacarInvestimentoService $sacarInvestimentoService,
    )
    {
        $sacarInvestimentoService->execute($sacarInvestimentoDTO);

        return $this->json([
           
        ]);
    }
}
