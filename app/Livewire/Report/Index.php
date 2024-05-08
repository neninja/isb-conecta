<?php

namespace App\Livewire\Report;

use App\Models\Team;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $availableTeams = [
            Team::ID_RECEPCAO,
            Team::ID_SECRETARIA,
            Team::ID_ASSISTENCIA_SOCIAL,
            Team::ID_CONTABILIDADE,
            Team::ID_COORDENACAO_PEDAGOGICA,
            Team::ID_EDUCADORES,
            Team::ID_LIMPEZA,
            Team::ID_COZINHA,
            Team::ID_SERVICO_DE_APOIO,
            Team::ID_JARDINAGEM,
        ];

        return view('livewire.reports.index', [
            'links' => array_map(fn ($teamId) => $this->href($teamId), $availableTeams),
        ])->layoutData([
            'title' => 'Central de Relatórios',
            'description' => 'Você está cadastrado no setor de Recepção, aqui você encontra todas as funções de relatórios disponíveis.',
        ]);
    }

    public function href($teamId): array
    {
        return ['href' => route('reports.team', $teamId), 'label' => Team::label($teamId)];
    }
}
