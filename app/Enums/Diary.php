<?php

namespace App\Enums;

enum Diary: string
{
    case Group = 'group';
    case Activity = 'activity';

    public function label(): string
    {
        return match ($this) {
            self::Group => 'Turma',
            self::Activity => 'Atividade',
        };
    }
}
