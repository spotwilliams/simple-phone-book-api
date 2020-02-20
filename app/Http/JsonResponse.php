<?php

namespace App\Http;

use League\Fractal\Manager;
use Psr\Http\Message\ResponseInterface as Response;

class JsonResponse
{
    public static function response(Response $response, $resource, $status = 200): Response
    {
        $manager = new Manager();

        $response->getBody()->write($manager->createData($resource)->toJson());

        return $response->withStatus($status);
    }
}
