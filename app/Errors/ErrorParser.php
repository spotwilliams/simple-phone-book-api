<?php

namespace App\Errors;

use Doctrine\ORM\EntityNotFoundException;

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
            default: {
                return [
                    'code' => 500,
                    'message' => 'Something went wrong',
                ];
            }
        }
    }
}