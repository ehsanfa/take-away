<?php

namespace App\Modules\Restaurant\Domain\ValueObjects;

use App\Modules\Restaurant\Domain\Enums\Status as StatusEnum;

class Status implements \Stringable
{
    public function __construct(private StatusEnum $value)
    {
    }

    public function getValue(): StatusEnum
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->getValue()->value;
    }
}