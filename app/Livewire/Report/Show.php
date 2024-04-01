<?php

namespace App\Livewire\Report;

use App\Livewire\Component;
use App\Livewire\Components;
use App\Models\Team;

class Show extends Component
{
    public string $team;

    public function getTitle(): string
    {
        return 'Filtro de Buscas';
    }

    public function getDescription(): string
    {
        return 'Selecione a data desejada e os diferentes relatórios publicados pelo setor de recepção que deseja visualizar.';
    }

    public function mount()
    {
        match ($this->team) {
            Team::ID_RECEPCAO => $this->component(Components\Calendar::class, [
                ['href' => route('reports.show', 'a'), 'label' => 'Recepção'],
            ]),
            default => abort(404),
        };
    }
}
