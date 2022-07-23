<?php

namespace App\Modules\Item\Application\Controller;

use App\Modules\Item\Application\Create\CreateItemCommand;
use App\Modules\Shared\Application\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends AbstractController
{
    /**
     * @Route("/item", methods={"POST"}, name="create_item")
     */
    public function create(Request $request, CommandBus $bus): Response
    {
        $bus->handle(
            new CreateItemCommand("pizza")
        );
        return new Response('', Response::HTTP_CREATED);
    }
}