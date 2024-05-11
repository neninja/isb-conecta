<?php

namespace App\Livewire\Report;

use App\Models\Team;
use Livewire\Component;

class Create extends Component
{
    public string $report;

    public ?string $reportClassName = null;

    public function mount()
    {
        $this->reportClassName = collect(Team::mapReports()[user()->current_team_id])
            ->filter(fn ($r) => kebabClassBaseName($r) === $this->report)
            ->first();

        if (is_null($this->reportClassName)) {
            abort(404);
        }
    }

    public function render()
    {
        $team = Team::label(user()->current_team_id);

        return view('livewire.reports.create')->layoutData([
            'title' => $this->reportClassName::SINGULAR_LABEL,
            'subtitle' => "Setor de {$team}",
            'description' => 'Adicione as informações referentes ao relatório',
        ]);
    }
}
