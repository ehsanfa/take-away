<?php

namespace App\Modules\User\Domain;

use App\Modules\Shared\Domain\Entity;
use App\Modules\Shared\Domain\UserId;
use App\Modules\User\Domain\ValueObjects\Email;
use App\Modules\User\Domain\ValueObjects\FirstName;
use App\Modules\User\Domain\ValueObjects\LastName;

final class User extends Entity
{
    private FirstName $firstName;
    private LastName $lastName;

    private function __construct(
        private readonly UserId $id,
        private Email $email
    ) {}

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getFirstName(): FirstName
    {
        return $this->firstName;
    }

    public function setFirstName(FirstName $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): LastName
    {
        return $this->lastName;
    }

    public function setLastName(LastName $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public static function create(UserId $userId, Email $email, FirstName $firstName, LastName $lastName): self
    {
        $user = new self($userId, $email);
        $user->setFirstName($firstName);
        $user->setLastName($lastName);

        return $user;
    }

    public function __toArray()
    {
        return [
            "userId" => (string) $this->getId(),
            "email" => (string) $this->getEmail(),
            "firstName" => (string) $this->getFirstName(),
            "lastName" => (string) $this->getLastName(),
        ];
    }
}