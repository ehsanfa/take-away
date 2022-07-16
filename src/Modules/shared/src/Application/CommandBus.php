<?php

namespace App\Modules\Shared\Application;

use App\Modules\Shared\Application\Exception\MissingHandlerException;

class CommandBus
{
    public function __construct(private readonly array $handlers)
    {}

    public function handle(Command $command)
    {
        if (!isset($this->handlers[$command::class])) {
            throw new MissingHandlerException($command::class);
        }

        $this->handlers[$command::class]->__invoke($command);
    }
}