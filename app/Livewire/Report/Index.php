<?php

namespace App\Livewire\Report;

use App\Models\Team;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.reports.index', [
            'links' => [
                ['href' => route('reports.team', Team::ID_RECEPCAO), 'label' => 'Recepção'],
                // ['href' => '#', 'label' => 'Secretaria'],
                // ['href' => '#', 'label' => 'Assistência Social'],
                // ['href' => '#', 'label' => 'Contabilidade'],
                // ['href' => '#', 'label' => 'Coordenação'],
                // ['href' => '#', 'label' => 'Educadores'],
                // ['href' => '#', 'label' => 'Limpeza'],
                // ['href' => '#', 'label' => 'Cozinha'],
                // ['href' => '#', 'label' => 'Serviço de apoio'],
                // ['href' => '#', 'label' => 'Horta'],
            ],
        ])->layoutData([
            'title' => 'Central de Relatórios',
            'description' => 'Você está cadastrado no setor de Recepção, aqui você encontra todas as funções de relatórios disponíveis.',
        ]);
    }
}
