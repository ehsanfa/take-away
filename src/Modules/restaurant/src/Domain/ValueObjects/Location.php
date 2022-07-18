<?php

namespace App\Modules\Restaurant\Domain\ValueObjects;

use App\Modules\Shared\Domain\ValueObjects\GeoLocation;

class Location implements \Stringable
{
    public function __construct(private GeoLocation $geoLocation, private string $address)
    {}

    public function getGeoLocation(): GeoLocation
    {
        return $this->geoLocation;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getLatitude(): float
    {
        return $this->geoLocation->getLatitude();
    }

    public function getLongitude(): float
    {
        return $this->getGeoLocation()->getLongitude();
    }

    public function __toString(): string
    {
        return "address: " . $this->getAddress() . ", geolocation: " . $this->getGeoLocation();
    }

    public function __toArray(): array
    {
        return [
            "address" => $this->getAddress(),
            "latitude" => $this->getGeoLocation()->getLatitude(),
            "longitude" => $this->getGeoLocation()->getLongitude(),
        ];
    }
}