<?php

namespace App\Errors;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Handlers\ErrorHandler as SlimErrorHandler;
use Throwable;

class ErrorHandler extends SlimErrorHandler
{
    use ErrorParser;

    public function __invoke(ServerRequestInterface $request, Throwable $exception, bool $displayErrorDetails, bool $logErrors, bool $logErrorDetails): ResponseInterface
    {
        $response = parent::__invoke($request, $exception, $displayErrorDetails, $logErrors, $logErrorDetails);

        $data = $this->parseError($exception);

        return $response->withStatus($data['code']);
    }
}
