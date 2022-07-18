<?php

namespace App\Modules\Shared\Infrastructure;

use App\Modules\Shared\Domain\Entity;

interface SavableEntityDatabaseAdapterInterface extends DatabaseAdapterInterface
{
    public function save(Entity $entity);
}