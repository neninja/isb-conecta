<?php

namespace App\Enums;

enum Status: string
{
    case Pending = 'pending';
    case Executed = 'executed';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pendente',
            self::Executed => 'Realizada',
        };
    }
}
