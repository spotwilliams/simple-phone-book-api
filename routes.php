<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Handlers\CreateContactHandler;
use App\Handlers\ReadContactHandler;
use App\Handlers\UpdateContactHandler;
use App\Handlers\DeleteContactHandler;

// Create a contact
$app->post(\App\Handlers\CreateContactHandler::ROUTE, function (Request $request, Response $response, CreateContactHandler $handler) {
    return \App\Http\JsonResponse::response($response, $handler(new \App\Requests\CreateContactRequest($request)));
});

// Read contact
$app->get(\App\Handlers\ReadContactHandler::ROUTE, function (Request $request, Response $response, ReadContactHandler $handler) {
    return \App\Http\JsonResponse::response($response, $handler($request));
});

// Update Contact
$app->put(\App\Handlers\UpdateContactHandler::ROUTE, function (Request $request, Response $response, UpdateContactHandler $handler) {
    return \App\Http\JsonResponse::response($response, $handler(new \App\Requests\UpdateContactRequest($request)));
});

// Delete Contact
$app->delete(\App\Handlers\DeleteContactHandler::ROUTE, function (Request $request, Response $response, DeleteContactHandler $handler) {
    $handler(new \App\Requests\DeleteContactRequest($request));

    return $response->withStatus(200);
});

$app->run();
