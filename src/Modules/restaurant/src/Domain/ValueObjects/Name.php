<?php

namespace App\Modules\Restaurant\Domain\ValueObjects;

class Name implements \Stringable
{
    public function __construct(private string $value)
    {}

    public function __toString(): string
    {
        return $this->getValue();
    }

    public function getValue(): string
    {
        return $this->value;
    }
}