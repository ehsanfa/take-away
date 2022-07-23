<?php

namespace App\modules\inventory;

use App\modules\shared\SharedKernel;

class Kernel extends SharedKernel
{

    public function getModule(): string
    {
        return 'inventory';
    }
}