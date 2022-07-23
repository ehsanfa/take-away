<?php

namespace App\Modules\Item\Service;

use App\Modules\Item\Domain\Item;
use App\Modules\Item\Domain\ValueObjects\Title;
use App\Modules\Item\Persistence\ItemRepository;
use App\Modules\Shared\Domain\ItemId;
use Ramsey\Uuid\Uuid;

class ItemCreator
{
    public function __construct(private ItemRepository $itemRepository)
    {}

    public function __invoke(Title $title)
    {
        $itemId = new ItemId(Uuid::uuid4());
        $item = Item::create($itemId, $title);
        $this->itemRepository->save($item);
    }
}