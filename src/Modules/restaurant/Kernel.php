<?php

namespace App\modules\restaurant;

use App\modules\shared\SharedKernel;

class Kernel extends SharedKernel
{

    public function getModule(): string
    {
        return 'restaurant';
    }
}