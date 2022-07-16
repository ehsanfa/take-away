<?php

namespace App\Modules\Shared\Application;

use App\Modules\User\Application\Create\UserCreatorCommandHandler;

 class CommandBus
{
    public function __construct(protected UserCreatorCommandHandler $commandHandler)
    {

    }

    public function handle(Command $command)
    {
        $this->commandHandler->__invoke($command);
    }
}