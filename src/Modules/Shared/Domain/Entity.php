<?php

namespace App\Modules\Shared\Domain;

abstract class Entity
{
    abstract public function __toArray();
}