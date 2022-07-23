<?php

namespace App\Modules\Item\Domain\ValueObjects;

class Title implements \Stringable
{
    public function __construct(private readonly string $value)
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