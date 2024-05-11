<?php

namespace App\Livewire\Reports;

use App\Models\Team;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class SearchFromTeam extends Component
{
    use WithoutUrlPagination, WithPagination;

    public Team $team;

    public array $optionsReports;

    public string $date;

    public array $selectedReports;

    public bool $searchValidated = false;

    public function mount()
    {
        $this->optionsReports = array_merge(
            [['name' => 'all', 'label' => 'Todos os relatorios']],
            $this->team->reportables()->map(fn ($report) => $this->option($report))->toArray()
        );
    }

    protected function option(string $model): array
    {
        return ['name' => $model, 'label' => (new $model)::PLURAL_LABEL];
    }

    public function render()
    {
        $team = Team::label($this->team->id);

        return view('livewire.reports.search-from-team')->layoutData([
            'title' => 'Filtro de Buscas',
            'subtitle' => "Setor de {$team}",
            'description' => 'Selecione a data desejada e os diferentes relatórios publicados pelo setor de recepção que deseja visualizar.',
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
