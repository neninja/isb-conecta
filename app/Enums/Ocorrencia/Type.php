<?php

namespace App\Enums\Ocorrencia;

enum Type: string
{
    case Urgent = 'urgent';

    public function label(): string
    {
        return match ($this) {
            self::Urgent => 'Assuntos Urgentes',
        };
    }
}
