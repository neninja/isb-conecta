<?php

namespace App\Enums;

enum Sponsor: string
{
    case Fasc = 'fasc';
    case Funcrianca = 'funcrianca';

    public function label(): string
    {
        return match ($this) {
            self::Fasc => 'FASC',
            self::Funcrianca => 'Funcriança',
        };
    }
}
