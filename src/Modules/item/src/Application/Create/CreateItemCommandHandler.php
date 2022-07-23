<?php

namespace App\Modules\Item\Application\Create;

use App\Modules\Item\Domain\ValueObjects\Title;
use App\Modules\Item\Service\ItemCreator;
use App\Modules\Shared\Application\Command;

class CreateItemCommandHandler
{
    public function __construct(private ItemCreator $itemCreator)
    {}

    public function __invoke(Command $command)
    {
        $title = new Title($command->getTitle());
        $this->itemCreator->__invoke($title);
    }
}