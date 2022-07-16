<?php

namespace App\Modules\User\Domain\ValueObjects;

abstract class Name implements \Stringable
{
    public function __construct(protected string $value)
    {}

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->getValue();
    }
}