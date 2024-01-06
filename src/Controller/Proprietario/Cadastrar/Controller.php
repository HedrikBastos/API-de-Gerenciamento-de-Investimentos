<?php

namespace App\Controller\Proprietario\Cadastrar;

use App\DTO\Proprietario\CadastrarProprietarioDTO;
use App\Service\Proprietario\CadastrarProprietarioService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/proprietario', methods: ['POST'])]
class Controller extends AbstractController
{
    public function __invoke(
        #[MapRequestPayload]
        CadastrarProprietarioDTO $cadastrarProprietarioDTO,
        CadastrarProprietarioService $cadastrarProprietarioService
    )
    {
        $cadastrarProprietarioService->execute($cadastrarProprietarioDTO);

        return $this->json([
            'message' => 'Sucesso ao cadastrar Proprietario'
        ]);
    }
}


