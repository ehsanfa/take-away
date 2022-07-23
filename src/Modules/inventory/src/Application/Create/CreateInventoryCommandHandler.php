<?php

namespace App\Modules\Inventory\Application\Create;

use App\Modules\Inventory\Service\InventoryCreator;
use App\Modules\Inventory\Domain\ValueObjects\Status;
use App\Modules\Shared\Application\Command;
use App\Modules\Shared\Domain\ItemId;

class CreateInventoryCommandHandler
{
    public function __construct(private InventoryCreator $inventoryCreator)
    {}

    public function __invoke(Command $command)
    {
        $itemId = new ItemId($command->getItemId());
        $status = new Status($command->getStatus());
        $this->inventoryCreator->__invoke($itemId, $status);
    }
}