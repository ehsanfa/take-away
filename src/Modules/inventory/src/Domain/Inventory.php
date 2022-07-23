<?php

namespace App\Modules\Inventory\Domain;

use App\Modules\Inventory\Domain\ValueObjects\Status;
use App\Modules\Shared\Domain\Entity;
use App\Modules\Shared\Domain\InventoryId;
use App\Modules\Shared\Domain\ItemId;

class Inventory extends Entity
{
    private Status $status;

    private function __construct(private readonly InventoryId $id, private readonly ItemId $itemId) {}

    public function getId(): InventoryId
    {
        return $this->id;
    }

    public function getItemId(): ItemId
    {
        return $this->itemId;
    }

    public function setStatus(Status $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function __toArray()
    {
        return [
            'status' => (string) $this->getStatus(),
            'itemId' => (string) $this->getItemId(),
        ];
    }

    public static function create(InventoryId $id, ItemId $itemId, Status $status): self
    {
        $inventory = new self($id, $itemId);
        $inventory->setStatus($status);
        return $inventory;
    }
}