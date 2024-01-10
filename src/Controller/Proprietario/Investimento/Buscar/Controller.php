<?php

namespace App\Controller\Proprietario\Investimento\Buscar;

use App\Repository\InvestimentoRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/proprietario/{proprietarioId}/investimentos', name: 'buscar_investimentos', methods: ['GET'])]
class Controller extends AbstractController
{
    public function __invoke(
            Request $request,
            InvestimentoRepository $investimentoRepository            
    ): Response{
        $pagina = $request->query->getInt('pagina', 1);
        $itensPorPagina = $request->query->getInt('itens_por_pagina', 10);

        $investimentos = $investimentoRepository->buscarInvestimentosPaginados($pagina, $itensPorPagina);

        $investimentosPaginados = [];

        foreach ($investimentos as $investimento){
            $investimentosPaginados[] = [
                'id' => $investimento->id(),
                    'criadoEm' => $investimento->criadoEm(),
                    'valorInicial' => $investimento->valorInicial(),
                    'saldo' => $investimento->saldo(),
                    'atualizadoEm' => $investimento->atualizadoEm()     
            ];
        }

        return $this->json([
            $investimentosPaginados
        ]);
    }

}
