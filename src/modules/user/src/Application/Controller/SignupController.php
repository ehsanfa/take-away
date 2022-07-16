<?php

namespace App\Modules\User\Application\Controller;

use App\Modules\Shared\Application\CommandBus;
use App\Modules\Shared\Application\CommandBusInterface;
use App\Modules\User\Application\Create\UserCreatorCommand;
use App\Modules\User\Application\Create\UserCreatorCommandHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SignupController extends AbstractController
{
    /**
     * @Route("/user/signup", methods={"POST"}, name="user_signup")
     */
    public function signup(Request $request, CommandBus $bus): Response
    {
        $bus->handle(
            new UserCreatorCommand("email", "hasan", "hooshang")
        );
        return new JsonResponse([
            "result" => "okay"
        ]);
    }
}