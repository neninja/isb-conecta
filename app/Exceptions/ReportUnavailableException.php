<?php

namespace App\Exceptions;

class ReportUnavailableException extends AppException
{
    public function __construct(
        string $message = '',
        int $code = 0,
        ?\Throwable $previous = null,
        public array $data = []
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function friendlyReport(): string
    {
        return 'Relatório indisponível';
    }
}
