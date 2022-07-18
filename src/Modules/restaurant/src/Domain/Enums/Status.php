<?php

namespace App\Modules\Restaurant\Domain\Enums;

enum Status: int
{
    case Active = 1;
    case Deactivated = 2;
}