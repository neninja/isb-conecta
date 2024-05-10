<?php

namespace App\Enums\PlantioColheita;

enum Status: string
{
    case Planted = 'planted';
    case Harvest = 'harvest';

    public function label(): string
    {
        return match ($this) {
            self::Planted => 'Plantio',
            self::Harvest => 'Colheito',
        };
    }
}
