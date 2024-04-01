<?php

namespace App\Livewire\Report;

use App\Livewire\Component;
use App\Livewire\Components\ResourceList;
use App\Models\Team;

class Index extends Component
{
    public function getTitle(): string
    {
        return 'Central de Relatórios';
    }

    public function getDescription(): string
    {
        return 'Você está cadastrado no setor de Recepção, aqui você encontra todas as funções de relatórios disponíveis.';
    }

    public function mount()
    {

        $this->component(
            name: ResourceList::class,
            content: [
                ['href' => route('reports.show', Team::ID_RECEPCAO), 'label' => 'Recepção'],
                ['href' => '#', 'label' => 'Secretaria'],
                ['href' => '#', 'label' => 'Assistência Social'],
                ['href' => '#', 'label' => 'Contabilidade'],
                ['href' => '#', 'label' => 'Coordenação'],
                ['href' => '#', 'label' => 'Educadores'],
                ['href' => '#', 'label' => 'Limpeza'],
                ['href' => '#', 'label' => 'Cozinha'],
                ['href' => '#', 'label' => 'Serviço de apoio'],
                ['href' => '#', 'label' => 'Horta'],
            ],
            options: ['icons' => 'heroicon-o-plus-circle'],
        );
    }
}
