<?php

namespace App\Modules\User\Application\Create;

use App\Modules\Shared\Domain\UserId;
use App\Modules\User\Domain\ValueObjects\Email;
use App\Modules\User\Domain\ValueObjects\FirstName;
use App\Modules\User\Domain\ValueObjects\LastName;
use App\Modules\User\Service\UserCreator;

class UserCreatorCommandHandler
{
    public function __construct(private UserCreator $userCreator)
    {}

    public function __invoke(UserCreatorCommand $command)
    {
        $email = new Email($command->getEmail());
        $firstName = new FirstName($command->getFirstName());
        $lastName = new LastName($command->getLastName());

        $this->userCreator->__invoke($email, $firstName, $lastName);
    }
}