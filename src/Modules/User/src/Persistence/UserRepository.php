<?php

namespace App\Modules\User\Persistence;

use App\Modules\User\Domain\User;
use App\Modules\User\Infrastructure\DatabaseAdapterInterface;

class UserRepository
{
    public function __construct(private DatabaseAdapterInterface $databaseAdapter)
    {}

    public function save(User $user)
    {
        $this->databaseAdapter->save($user);
    }
}