<?php

namespace App\Modules\Inventory\Application\Controller;

use App\Modules\Inventory\Domain\Enums\Status;
use App\Modules\Inventory\Application\Create\CreateInventoryCommand;
use App\Modules\Shared\Application\CommandBus;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InventoryController extends AbstractController
{
    /**
     * @Route("/inventory", methods={"POST"}, name="create_inventory")
     */
    public function create(Request $request, CommandBus $bus): Response
    {
        $itemId = Uuid::uuid4();
        $bus->handle(
            new CreateInventoryCommand($itemId, Status::Active)
        );
        return new Response('', Response::HTTP_CREATED);
    }
}