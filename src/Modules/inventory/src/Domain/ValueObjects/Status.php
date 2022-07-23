<?php

namespace App\Modules\Inventory\Domain\ValueObjects;

use App\Modules\Inventory\Domain\Enums\Status as StatusEnum;

class Status implements \Stringable
{
    public function __construct(private readonly StatusEnum $value)
    {}

    public function getValue()
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->getValue()->value;
    }
}