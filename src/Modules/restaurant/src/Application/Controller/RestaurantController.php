<?php

namespace App\Modules\Restaurant\Application\Controller;

use App\Modules\Shared\Application\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    /**
     * @Route("/restaurants", methods={"POST"}, name="create_restaurant")
     */
    public function create(Request $request, CommandBus $bus): Response
    {

        return new JsonResponse([
            "result" => "okay"
        ]);
    }
}