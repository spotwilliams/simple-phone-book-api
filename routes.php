<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Handlers\AuthorizeHandler;
use App\Handlers\CreateContactHandler;
use App\Handlers\ReadContactHandler;
use App\Handlers\ListContactHandler;
use App\Handlers\UpdateContactHandler;
use App\Handlers\DeleteContactHandler;
use \App\Http\JsonResponse;

// Authorize
$app->post(AuthorizeHandler::ROUTE, function (Request $request, Response $response, AuthorizeHandler $handler) {
    return JsonResponse::response($response, $handler($request));
});

// Create a contact
$app->post(CreateContactHandler::ROUTE, function (Request $request, Response $response, CreateContactHandler $handler) {
    return JsonResponse::response($response, $handler(new \App\Requests\CreateContactRequest($request)));
});

// Read contact
$app->get(ReadContactHandler::ROUTE, function (Request $request, Response $response, ReadContactHandler $handler) {
    return JsonResponse::response($response, $handler(new \App\Requests\ReadContactRequest($request)));
});

// Read contact (list)
$app->get(ListContactHandler::ROUTE, function (Request $request, Response $response, ListContactHandler $handler) {
    return JsonResponse::response($response, $handler($request));
});

// Update Contact
$app->put(UpdateContactHandler::ROUTE, function (Request $request, Response $response, UpdateContactHandler $handler) {
    return JsonResponse::response($response, $handler(new \App\Requests\UpdateContactRequest($request)));
});

// Delete Contact
$app->delete(DeleteContactHandler::ROUTE, function (Request $request, Response $response, DeleteContactHandler $handler) {
    $handler(new \App\Requests\DeleteContactRequest($request));

    return $response->withStatus(200);
});

$app->run();
