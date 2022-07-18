<?php

namespace App\Modules\Shared\Persistence;

use App\Modules\Shared\Domain\Entity;
use App\Modules\Shared\Infrastructure\DatabaseAdapterInterface;

class BaseRepository
{
    public function __construct(private DatabaseAdapterInterface $databaseAdapter)
    {}

    public function save(Entity $entity)
    {
        $this->databaseAdapter->save($entity);
    }
}