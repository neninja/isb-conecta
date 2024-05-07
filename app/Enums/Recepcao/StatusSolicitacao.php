<?php

namespace App\Enums\Recepcao;

enum StatusSolicitacao: string
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
