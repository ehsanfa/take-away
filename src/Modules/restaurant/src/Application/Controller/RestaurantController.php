<?php

namespace App\Modules\Restaurant\Application\Controller;

use App\Modules\Restaurant\Application\Create\CreateRestaurantCommand;
use App\Modules\Restaurant\Domain\Enums\Status;
use App\Modules\Restaurant\Domain\ValueObjects\Location;
use App\Modules\Shared\Application\CommandBus;
use App\Modules\Restaurant\Domain\ValueObjects\GeoLocation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    /**
     * @Route("/restaurant", methods={"POST"}, name="create_restaurant")
     */
    public function create(Request $request, CommandBus $bus): Response
    {
        $geoLocation = new GeoLocation(34.43, 56.3434);
        $location = new Location($geoLocation, "test address");
        $bus->handle(
            new CreateRestaurantCommand(12, "hasan", $location, Status::Active)
        );
        return new JsonResponse([
            "result" => "okay"
        ]);
    }
}