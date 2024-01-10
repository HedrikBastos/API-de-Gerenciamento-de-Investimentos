<?php

namespace App\Controller\Proprietario\Buscar;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Proprietario\BuscarProprietarioService;
use App\Service\Investimento\AtualizaGanhoInvestimentoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/proprietario/{proprietarioId}', name: 'buscar_proprietario', methods: ['GET'])]
class Controller extends AbstractController
{
    public function __invoke(
        BuscarProprietarioService $buscarProprietarioService,
        AtualizaGanhoInvestimentoService $atualizaGanhoInvestimentoService,
        int $proprietarioId
    ): Response {

        $proprietario = $buscarProprietarioService->execute($proprietarioId);

        $atualizaGanhoInvestimentoService->execute(new \DateTime());

        return $this->json([
            'id' => $proprietario->id(),
            'nome' => $proprietario->nome(),
            'criadoEm' => $proprietario->criadoEm()
        ]);
    }
}
