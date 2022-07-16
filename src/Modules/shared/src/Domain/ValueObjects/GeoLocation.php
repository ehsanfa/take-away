<?php

namespace App\Modules\Shared\Domain\ValueObjects;

class GeoLocation implements \Stringable
{
    public function __construct(private float $latitude, private float $longitude)
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