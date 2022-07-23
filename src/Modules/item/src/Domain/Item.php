<?php

namespace App\Modules\Item\Domain;

use App\Modules\Item\Domain\ValueObjects\Title;
use App\Modules\Shared\Domain\Entity;
use App\Modules\Shared\Domain\ItemId;

class Item extends Entity
{
    private Title $title;

    private function __construct(private readonly ItemId $id) {}

    public function getId(): ItemId
    {
        return $this->id;
    }

    public function setTitle(Title $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle(): Title
    {
        return $this->title;
    }

    public function __toArray()
    {
        return [
            'title' => (string) $this->title,
        ];
    }

    public static function create(ItemId $id, Title $title): self
    {
        $item = new self($id);
        $item->setTitle($title);
        return $item;
    }
}