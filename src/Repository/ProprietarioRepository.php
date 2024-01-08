<?php

namespace App\Repository;

use App\Entity\Proprietario;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class ProprietarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $manegerRegistry)
    {
        parent::__construct($manegerRegistry, Proprietario::class);
    }

    public function add(Proprietario $proprietario, bool $flush = false): void
    {
        $this->getEntityManager()->persist($proprietario);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
