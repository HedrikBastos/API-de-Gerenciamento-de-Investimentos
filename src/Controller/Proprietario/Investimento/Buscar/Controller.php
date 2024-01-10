<?php

namespace App\Controller\Proprietario\Investimento\Buscar;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\Proprietario\BuscarProprietarioService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/proprietario/{proprietarioId}/investimentos', name: 'buscar_investimentos', methods: ['GET'])]
class Controller extends AbstractController
{
    public function __invoke(
        BuscarProprietarioService $buscarProprietarioService,
        int $proprietarioId
    ): Response{

        $proprietario = $buscarProprietarioService->execute($proprietarioId);
        return $this->json([
            'investimentos' => $proprietario->jsonSerialize()['investimentos']
        ]);
    }

}
