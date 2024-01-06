<?php

namespace App\Repository;

use App\Entity\Investimento;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class InvestimentoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Investimento::class);
    }

    public function add(Investimento $investimento, bool $flush = false): void
    {
        $this->getEntityManager()->persist($investimento);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
