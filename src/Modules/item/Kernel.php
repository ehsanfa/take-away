<?php

namespace App\modules\item;

use App\modules\shared\SharedKernel;

class Kernel extends SharedKernel
{

    public function getModule(): string
    {
        return 'item';
    }
}