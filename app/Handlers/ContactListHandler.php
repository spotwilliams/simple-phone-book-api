<?php

namespace App\Handlers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ContactListHandler
{
    const ROUTE = '/contacts';

    public function __invoke(Request $request, Response $response)
    {
        return $response;
    }
}