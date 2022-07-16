<?php

namespace App\Modules\User\Infrastructure;

use App\Modules\Shared\Domain\Entity;

interface DatabaseAdapterInterface
{
    public function save(Entity $entity);
}