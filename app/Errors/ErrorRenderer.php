<?php

namespace App\Errors;

use Slim\Exception\HttpNotFoundException;
use Slim\Interfaces\ErrorRendererInterface;

class ErrorRenderer implements ErrorRendererInterface
{
    /**
     * @param \Throwable | HttpNotFoundException $exception
     * @param bool       $displayErrorDetails
     *
     * @return string
     */
    public function __invoke(\Throwable $exception, bool $displayErrorDetails): string
    {
        $data = [
            'code' => $exception->getCode(),
            'message' => $exception->getMessage(),
        ];

        return json_encode($data);
    }
}
