<?php

namespace App\Controller\Proprietario\Buscar;

use App\Service\Investimento\AtualizaGanhoInvestimentoService;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Proprietario\BuscarProprietarioService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/proprietario/{proprietarioId}', name: 'buscar_proprietario', methods: ['GET'])]
class Controller extends AbstractController
{
    public function __invoke(
        BuscarProprietarioService $buscarProprietarioService,
        AtualizaGanhoInvestimentoService $atualizaGanhoInvestimentoService,
        int $proprietarioId
    ) {

        $proprietario = $buscarProprietarioService->execute($proprietarioId);

        $atualizaGanhoInvestimentoService->execute();

        return $this->json([
            'proprietario' => $proprietario
        ]);
    }
}
