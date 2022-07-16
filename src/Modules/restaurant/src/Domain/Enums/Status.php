<?php

namespace App\Modules\Restaurant\Domain\Enums;

enum Status: string
{
    case Active = 'active';
    case Deactivated = 'deactivated';
}