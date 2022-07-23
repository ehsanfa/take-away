<?php

namespace App\Modules\Item\Application\Create;

use App\Modules\Shared\Application\Command;

class CreateItemCommand extends Command
{
    public function __construct(
        private readonly string $title
    )
    {}

    public function getTitle(): string
    {
        return $this->title;
    }
}