<?php

namespace App\Modules\Shared\Domain;

use App\Modules\Shared\Domain\ValueObjects\Uuid;

class UserId extends Uuid implements \Stringable
{
}