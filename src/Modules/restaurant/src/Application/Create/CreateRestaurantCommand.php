<?php

namespace App\Modules\Restaurant\Application\Create;

use App\Modules\Restaurant\Domain\Enums\Status;
use App\Modules\Restaurant\Domain\ValueObjects\Location;
use App\Modules\Restaurant\Domain\ValueObjects\Name;
use App\Modules\Shared\Application\Command;
use App\Modules\Shared\Domain\UserId;

class CreateRestaurantCommand extends Command
{
    public function __construct(
        private readonly string $userId,
        private readonly string   $name,
        private readonly Location $location,
        private readonly Status $status
    ) {}

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }
}