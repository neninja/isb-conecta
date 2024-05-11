<?php

namespace App\Exceptions;

abstract class AppException extends \Exception
{
    public function __construct(
        string $message = '',
        int $code = 0,
        ?\Throwable $previous = null,
        public array $data = []
    ) {
        parent::__construct($message, $code, $previous);
    }

    abstract public function friendlyReport(): string;
}
