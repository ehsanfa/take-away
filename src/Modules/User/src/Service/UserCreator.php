<?php

namespace App\Modules\User\Service;

use App\Modules\Shared\Domain\UserId;
use App\Modules\User\Domain\User;
use App\Modules\User\Domain\ValueObjects\Email;
use App\Modules\User\Domain\ValueObjects\FirstName;
use App\Modules\User\Domain\ValueObjects\LastName;
use App\Modules\User\Persistence\UserRepository;
use Ramsey\Uuid\Uuid;

final class UserCreator
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function __invoke(Email $email, FirstName $firstName, LastName $lastName)
    {
        $userId = new UserId(Uuid::uuid4());
        $user = User::create($userId, $email, $firstName, $lastName);
        $this->userRepository->save($user);
    }
}