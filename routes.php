<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// Start or find Phone Book
$app->get('/contacts', function (Request $request, Response $response, \App\Handlers\CreateContactHandler $handler) {
    return $handler($request, $response);
});

$app->post(\App\Handlers\CreateContactHandler::ROUTE, \App\Handlers\CreateContactHandler::class);

// Create a contact
$app->post(\App\Handlers\CreateContactHandler::ROUTE. 'asdasd', function (Request $request, Response $response) {
    $handler = new \App\Handlers\CreateContactHandler();
    return $handler(new \App\Requests\CreateContactRequest($request), $response);
});

// Read contact
$app->get(\App\Handlers\ReadContactHandler::ROUTE, \App\Handlers\ReadContactHandler::class);

// Update Contact
$app->put(\App\Handlers\UpdateContactHandler::ROUTE, \App\Handlers\UpdateContactHandler::class);

// Delete Contact
$app->delete(\App\Handlers\DeleteContactHandler::ROUTE, \App\Handlers\DeleteContactHandler::class);

$app->run();
