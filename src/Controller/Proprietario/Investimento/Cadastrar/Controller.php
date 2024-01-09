<?php

namespace App\Controller\Proprietario\Investimento\Cadastrar;

use Symfony\Component\Routing\Attribute\Route;
use App\DTO\Investimento\CadastrarInvestimentoDTO;
use App\Service\Investimento\CadastrarInvestimentoService;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/proprietario/investimento/{proprietarioId}',name:'investimento', methods: ['POST'])]
class Controller extends AbstractController
{
    public function __invoke(
        #[MapRequestPayload]
        CadastrarInvestimentoDTO $cadastrarInvestimentoDTO,
        CadastrarInvestimentoService $cadastrarInvestimentoService,
        int $proprietarioId
    )
    {
        $cadastrarInvestimentoService->execute($cadastrarInvestimentoDTO,$proprietarioId);

        return $this->json([
            'message' => 'Sucesso ao cadastrar Investimento'
        ]);
    }
}
