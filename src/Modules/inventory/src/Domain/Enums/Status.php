<?php

namespace App\Modules\Inventory\Domain\Enums;

enum Status: int
{
    case Active = 1;
    case Deactivated = 2;
}