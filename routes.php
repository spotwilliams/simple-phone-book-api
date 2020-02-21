<?php

use Psr\Http\Message\ResponseInterface as Response;
use Slim\Interfaces\RouteCollectorProxyInterface;
use App\Requests\Request;
use App\Responses\JsonResponse;

use App\Middleware\AuthorizationMiddleware;
use App\Handlers\AuthorizeHandler;
use App\Handlers\CreateContactHandler;
use App\Handlers\ReadContactHandler;
use App\Handlers\ListContactHandler;
use App\Handlers\UpdateContactHandler;
use App\Handlers\DeleteContactHandler;

// Authorize
$app->post(AuthorizeHandler::ROUTE, function (Request $request, Response $response, AuthorizeHandler $handler) {
    return JsonResponse::response($response, $handler($request));
});

$app->group('', function (RouteCollectorProxyInterface $group) {

    // Create a contact
    $group->post(CreateContactHandler::ROUTE, function (Request $request, Response $response, CreateContactHandler $handler) {
        return JsonResponse::response($response, $handler(new \App\Requests\CreateContactRequest($request)));
    });

    // Read contact
    $group->get(ReadContactHandler::ROUTE, function (Request $request, Response $response, ReadContactHandler $handler) {
        return JsonResponse::response($response, $handler(new \App\Requests\ReadContactRequest($request)));
    });

    // Read contact (list)
    $group->get(ListContactHandler::ROUTE, function (Request $request, Response $response, ListContactHandler $handler) {
        return JsonResponse::response($response, $handler($request));
    });

    // Update Contact
    $group->put(UpdateContactHandler::ROUTE, function (Request $request, Response $response, UpdateContactHandler $handler) {
        return JsonResponse::response($response, $handler(new \App\Requests\UpdateContactRequest($request)));
    });

    // Delete Contact
    $group->delete(DeleteContactHandler::ROUTE, function (Request $request, Response $response, DeleteContactHandler $handler) {
        $handler(new \App\Requests\DeleteContactRequest($request));

        return $response->withStatus(200);
    });

})->add(AuthorizationMiddleware::class);

$app->run();
