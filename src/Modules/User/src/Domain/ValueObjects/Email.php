<?php

namespace App\Modules\User\Domain\ValueObjects;

class Email implements \Stringable
{
    public function __construct(protected string $address)
    {}

    public function getAddress(): string
    {
        return $this->address;
    }

    public function __toString(): string
    {
        return $this->getAddress();
    }
}