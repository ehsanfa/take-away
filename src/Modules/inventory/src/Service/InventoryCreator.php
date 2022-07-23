<?php

namespace App\Modules\Inventory\Service;

use App\Modules\Inventory\Persistence\InventoryRepository;
use App\Modules\Inventory\Domain\Inventory;
use App\Modules\Inventory\Domain\ValueObjects\Status;
use App\Modules\Shared\Domain\InventoryId;
use App\Modules\Shared\Domain\ItemId;
use Ramsey\Uuid\Uuid;

class InventoryCreator
{
    public function __construct(private InventoryRepository $inventoryRepository)
    {}

    public function __invoke(ItemId $itemId, Status $status)
    {
        $inventoryId = new InventoryId(Uuid::uuid4());
        $item = Inventory::create($inventoryId, $itemId, $status);
        $this->inventoryRepository->save($item);
    }
}