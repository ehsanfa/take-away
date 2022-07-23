<?php

namespace App\Modules\Inventory\Application\Create;

use App\Modules\Inventory\Domain\Enums\Status;
use App\Modules\Shared\Application\Command;
use App\Modules\Shared\Domain\ItemId;

class CreateInventoryCommand extends Command
{
    public function __construct(
        private readonly string $itemId,
        private readonly Status $status
    )
    {}

    public function getItemId(): string
    {
        return $this->itemId;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }
}