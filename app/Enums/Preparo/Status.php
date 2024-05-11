<?php

namespace App\Enums\Preparo;

enum Status: string
{
    case Foreseen = 'foreseen';
    case Unforeseen = 'unforeseen';

    public function label(): string
    {
        return match ($this) {
            self::Foreseen => 'Previsto',
            self::Unforeseen => 'Não previsto',
        };
    }
}
