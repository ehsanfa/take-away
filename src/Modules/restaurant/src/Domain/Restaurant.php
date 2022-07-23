<?php

namespace App\Modules\Restaurant\Domain;

use App\Modules\Restaurant\Domain\Enums\Status as StatusEnum;
use App\Modules\Restaurant\Domain\ValueObjects\Location;
use App\Modules\Restaurant\Domain\ValueObjects\Name;
use App\Modules\Restaurant\Domain\ValueObjects\Status;
use App\Modules\Restaurant\Domain\ValueObjects\UserId;
use App\Modules\Shared\Domain\Entity;
use App\Modules\Shared\Domain\RestaurantId;

class Restaurant extends Entity
{
    private UserId $userId;
    private Location $location;
    private Name $name;
    private Status $status;

    private function __construct(private readonly RestaurantId $id)
    {
        $this->status = new Status(StatusEnum::Deactivated);
    }

    public function __toArray()
    {
        return [
            'restaurantId' => (string) $this->getId(),
            'location' => (array) $this->getLocation(),
            'name' => (string) $this->getName(),
            'status' => (string) $this->getStatus(),
            'userId' => (string) $this->getUserId(),
        ];
    }

    public function getId(): RestaurantId
    {
        return $this->id;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function setUserId(UserId $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function setLocation(Location $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function setName(Name $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function setStatus(Status $status): self
    {
        $this->status = $status;
        return $this;
    }

    public static function create(
        RestaurantId $restaurantId,
        UserId $userId,
        Name $name,
        Location $location,
        Status $status
    ) {
        $restaurant = new self($restaurantId);
        $restaurant->setUserId($userId);
        $restaurant->setName($name);
        $restaurant->setLocation($location);
        $restaurant->setStatus($status);
        return $restaurant;
    }


}