<?php

namespace App\Livewire\Report;

use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Recepcao extends Component
{
    use WithoutUrlPagination, WithPagination;

    public array $optionsReports;

    public string $date;

    public array $selectedReports;

    public bool $searchValidated = false;

    public function mount()
    {
        $this->optionsReports = [
            ['name' => 'all', 'label' => 'Todos os relatorios'],
            $this->option(\App\Models\Atendimento::class),
            $this->option(\App\Models\Solicitacao::class),
            $this->option(\App\Models\Telefonema::class),
            $this->option(\App\Models\Observacao::class),
            $this->option(\App\Models\Ocorrencia::class),
        ];
    }

    protected function option(string $model): array
    {
        return ['name' => $model, 'label' => (new $model)::PLURAL_LABEL];
    }

    public function render()
    {
        return view('livewire.reports.recepcao')->layoutData([
            'title' => 'Filtro de Buscas',
            'subtitle' => 'Setor de Recepção',
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
            ->orderByDesc('created_at')
            ->paginate(10);
    }
}
