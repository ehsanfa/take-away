<?php

namespace App\Modules\Shared\Domain\ValueObjects;

class Uuid implements \Stringable
{
    public function __construct(protected string $value)
    {}

    public function getValue()
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->getValue();
    }
}