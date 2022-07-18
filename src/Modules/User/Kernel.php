<?php

namespace App\modules\user;

use App\modules\shared\SharedKernel;

class Kernel extends SharedKernel
{

    public function getModule(): string
    {
        return 'user';
    }
}