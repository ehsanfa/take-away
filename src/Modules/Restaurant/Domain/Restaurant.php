<?php

namespace App\Modules\Restaurant\Domain;

use App\Modules\Restaurant\Domain\Enums\Status as StatusEnum;
use App\Modules\Restaurant\Domain\ValueObjects\Location;
use App\Modules\Restaurant\Domain\ValueObjects\Name;
use App\Modules\Restaurant\Domain\ValueObjects\Status;
use App\Modules\Shared\Domain\Entity;
use App\Modules\Shared\Domain\RestaurantId;

class Restaurant extends Entity
{
    private Location $location;
    private Name $name;
    private Status $status;

    public function __construct(private readonly RestaurantId $id)
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
        ];
    }

    public function getId(): RestaurantId
    {
        return $this->id;
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
}