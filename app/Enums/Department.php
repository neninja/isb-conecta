<?php

namespace App\Enums;

enum Department: string
{
    case Administration = 'administration';
    case Finance = 'finance';
    case Reception = 'reception';

    public function label(): string
    {
        return match ($this) {
            self::Administration => 'Administração',
            self::Finance => 'Financeiro',
            self::Reception => 'Recepção',
        };
    }
}
