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
            Team::ID_RECEPCAO => $this
                ->component(Components\Calendar::class, [], ['name' => 'day'])
                ->component(Components\CheckboxGroup::class, [
                    ['name' => 'all', 'label' => 'Todos os relatorios'],
                    ['name' => 'atendimentos', 'label' => 'Atendimentos'],
                    ['name' => 'solicitacoes', 'label' => 'Solicitações'],
                    ['name' => 'observacoes', 'label' => 'Observações'],
                    ['name' => 'ocorrencias', 'label' => 'Ocorrências'],
                ])
                ->component(Components\Button::class, ['label' => 'Adicionar'], ['event' => 'tesevent']),
            default => abort(404),
        };
    }
}
