<?php

namespace App\Modules\Shared\Domain\ValueObjects;

abstract class GeoLocation implements \Stringable
{
    public function __construct(protected float $latitude, protected float $longitude)
    {}

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function __toString(): string
    {
        return "lat: " . $this->getLatitude() . ", lng: " . $this->getLongitude();
    }
}