<div>
    @if(!$searchValidated)
        <form class="space-y-6" wire:submit="handleSearch">
            <x-form-instruction>todos os campos são obrigatórios</x-form-instruction>
            <x-calendar wire:model="date"></x-calendar>
            <x-form-instruction>selecione 1 ou mais campos de relatórios</x-form-instruction>
            <x-checkbox-group :options="$optionsReports" wire:model="selectedReports"></x-checkbox-group>
            <x-button full>Pesquisar</x-button>
        </form>
    @else
        <h4 class="font-semibold text-sm text-neutral-low-dark uppercase">resultados encontrados para sua busca</h4>
        <p class="mt-8 text-primary uppercase font-extrabold">{{\Carbon\Carbon::createFromFormat('Y-m-d', $date)->translatedFormat('d \d\e F \d\e Y')}}</p>
        <p>Lista de relatórios de atendimento postados na data selecionada:</p>
        <div class="flex flex-col gap-4 mt-4" role="list">
            @forelse ($this->reports ?? [] as $report)
                <x-report-item :report="$report">
                    @include('livewire.reports.related-search.'.kebabClassBaseName($report->related::class), ['report' => $report])
                </x-report-item>
            @empty
                <p role="listitem">{{ __('reports.empty') }}</p>
            @endforelse
            {{ $this->reports?->links('components.nav-pages') }}
        </div>
    @endif
</div>
