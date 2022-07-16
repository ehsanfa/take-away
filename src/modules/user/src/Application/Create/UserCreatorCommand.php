<?php

namespace App\Modules\User\Application\Create;

use App\Modules\Shared\Application\Command;

class UserCreatorCommand extends Command
{
    public function __construct(
        private readonly string $email,
        private readonly string $firstName,
        private readonly string $lastName
    ) {}

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}