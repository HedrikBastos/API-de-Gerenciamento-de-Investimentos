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

    public function add(Investimento $investimento, bool $flush = true): Investimento
    {

        $this->getEntityManager()->persist($investimento);

        if ($flush) {
            $this->flush();
        }

        return $investimento;
    }

    public function flush(): void
    {
        $this->getEntityManager()->flush();
    }

    public function remove($id, bool $flush = true): void
    {
        $this->getEntityManager()->remove($id);

        if ($flush) {
            $this->flush();
        }
    }
}
