<?php

namespace App\Errors;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Slim\Handlers\ErrorHandler as SlimErrorHandler;
use Slim\Interfaces\CallableResolverInterface;
use Throwable;

class ErrorHandler extends SlimErrorHandler
{
    use ErrorParser;

    /** @var LoggerInterface */
    private $logger;

    public function __construct(CallableResolverInterface $callableResolver, ResponseFactoryInterface $responseFactory, LoggerInterface $logger)
    {
        parent::__construct($callableResolver, $responseFactory);
        $this->logger = $logger;
    }

    public function __invoke(ServerRequestInterface $request, Throwable $exception, bool $displayErrorDetails, bool $logErrors, bool $logErrorDetails): ResponseInterface
    {
        $response = parent::__invoke($request, $exception, $displayErrorDetails, $logErrors, $logErrorDetails);

        $data = $this->parseError($exception);

        return $response->withStatus($data['code']);
    }

    protected function logError(string $error): void
    {
        $this->logger->error($error);;
    }
}
