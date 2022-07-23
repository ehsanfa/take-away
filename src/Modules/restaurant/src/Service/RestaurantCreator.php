<?php

namespace App\Modules\Restaurant\Service;

use App\Modules\Restaurant\Domain\Restaurant;
use App\Modules\Restaurant\Domain\ValueObjects\Location;
use App\Modules\Restaurant\Domain\ValueObjects\Name;
use App\Modules\Restaurant\Domain\ValueObjects\Status;
use App\Modules\Restaurant\Domain\ValueObjects\UserId;
use App\Modules\Restaurant\Persistence\RestaurantRepository;
use App\Modules\Shared\Domain\RestaurantId;
use Ramsey\Uuid\Uuid;

class RestaurantCreator
{
    public function __construct(private RestaurantRepository $restaurantRepository)
    {
    }

    public function __invoke(UserId $userId, Name $name, Location $location, Status $status)
    {
        $restaurantId = new RestaurantId(Uuid::uuid4());
        $restaurant = Restaurant::create($restaurantId, $userId, $name, $location, $status);
        $this->restaurantRepository->save($restaurant);
    }
}