<?php

namespace App\Enums;

enum Via: string
{
    case InPerson = 'in_person';
    case Phone = 'phone';

    public function label(): string
    {
        return match ($this) {
            self::InPerson => 'Porta',
            self::Phone => 'Telefone',
        };
    }
}
