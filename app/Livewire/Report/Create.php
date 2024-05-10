<?php

namespace App\Livewire\Report;

use App\Models\Team;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Create extends Component
{
    use WithoutUrlPagination, WithPagination;

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

    public function rules()
    {
        return [
            'date' => 'required|date',
            'selectedReports' => 'required|array',
            'selectedReports.*' => 'required|string',
        ];
    }

    public function handleSearch()
    {
        $this->validate();
        $this->searchValidated = true;
        unset($this->reports);
    }

    #[Computed()]
    public function reports(): LengthAwarePaginator
    {
        if (! $this->searchValidated) {
            return null;
        }

        return \App\Models\Report::query()
            ->whereIn('related_type', $this->selectedReports)
            ->where('date', $this->date)
            ->where('team_id', $this->team->id)
            ->orderByDesc('created_at')
            ->paginate(10);
    }
}
