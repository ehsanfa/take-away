<?php

namespace App\Modules\User\Infrastructure;

use App\Modules\Shared\Domain\Entity;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineDatabaseAdapter implements DatabaseAdapterInterface
{
    public function __construct(private ManagerRegistry $doctrine)
    {}

    public function save(Entity $entity)
    {
        $entityManager = $this->doctrine->getManager();
        $entityManager->persist($entity);
        $entityManager->flush();
    }
}