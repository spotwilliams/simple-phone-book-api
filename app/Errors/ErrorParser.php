<?php

namespace App\Errors;

use Doctrine\ORM\EntityNotFoundException;
use Respect\Validation\Exceptions\ValidationException;

trait  ErrorParser
{
    private function parseError(\Throwable $throwable): array
    {
        switch (true) {
            case ($throwable instanceof EntityNotFoundException): {
                return [
                    'code' => 404,
                    'message' => 'cant find contact',
                ];
            }
            case ($throwable instanceof ValidationException): {
                return [
                    'code' => 400,
                    'message' => 'validation fails',
                    'details' => $throwable->getMessage(),
                ];
            }
            default: {
                return [
                    'code' => 500,
                    'message' => 'Something went wrong',
                ];
            }
        }
    }
}