<?php

namespace App\Controller\Proprietario\Investimento;

use Symfony\Component\Routing\Attribute\Route;
use App\DTO\Proprietario\CadastrarInvestimentoDTO;
use App\Service\Investimento\CadastrarInvestimentoService;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/proprietario/{proprietario}',name:'investimento', methods: ['POST'])]
class Controller extends AbstractController
{
    public function __invoke(
        #[MapRequestPayload]
        CadastrarInvestimentoDTO $cadastrarInvestimentoDTO,
        CadastrarInvestimentoService $cadastrarInvestimentoService
    )
    {
        $cadastrarInvestimentoService->execute($cadastrarInvestimentoDTO);

        return $this->json([
            'message' => 'Sucesso ao cadastrar Investimento'
        ]);
    }
}
