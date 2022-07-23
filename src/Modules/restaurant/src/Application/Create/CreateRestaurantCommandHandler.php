<?php

namespace App\Modules\Restaurant\Application\Create;

use App\Modules\Restaurant\Domain\ValueObjects\Name;
use App\Modules\Restaurant\Domain\ValueObjects\Status;
use App\Modules\Restaurant\Domain\ValueObjects\UserId;
use App\Modules\Restaurant\Service\RestaurantCreator;
use App\Modules\Shared\Application\Command;

class CreateRestaurantCommandHandler
{
    public function __construct(private RestaurantCreator $restaurantCreator)
    {}

    public function __invoke(Command $command)
    {
        $userId = new UserId($command->getUserId());
        $name = new Name($command->getName());
        $location = $command->getLocation();
        $status = new Status($command->getStatus());
        $this->restaurantCreator->__invoke($userId, $name, $location, $status);
    }
}