<?php

namespace App\Errors;

use Slim\Exception\HttpNotFoundException;
use Slim\Interfaces\ErrorRendererInterface;

class ErrorRenderer implements ErrorRendererInterface
{
    use ErrorParser;

    /**
     * @param \Throwable | HttpNotFoundException $exception
     * @param bool       $displayErrorDetails
     *
     * @return string
     */
    public function __invoke(\Throwable $exception, bool $displayErrorDetails): string
    {
        return json_encode($this->parseError($exception));
    }
}
