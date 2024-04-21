<div>
    @if(!$searchValidated)
    <form class="space-y-6" wire:submit="handleSearch">
        <x-form-instruction>todos os campos são obrigatórios</x-form-instruction>
        <x-calendar wire:model="date"></x-calendar>
        <x-form-instruction>selecione 1 ou mais campos de relatórios</x-form-instruction>
        <x-checkbox-group :options="$optionsReports" wire:model="selectedReports"></x-checkbox-group>
        <x-button full>Adicionar</x-button>
    </form>
    @else
        <h4 class="font-semibold text-sm text-neutral-low-dark uppercase">resultados encontrados para sua busca</h4>
        <p class="mt-8 text-primary uppercase font-extrabold">{{\Carbon\Carbon::createFromFormat('Y-m-d', $date)->translatedFormat('d \d\e F \d\e Y')}}</p>
        <p>Lista de relatórios de atendimento postados na data selecionada:</p>
        <div class="flex flex-col gap-4 mt-4" role="list">
            @forelse ($reports ?? [] as $report)
                <x-report-item :report="$report">
                    <x-slot name="fixed">
                        <x-report-item-info icon="heroicon-o-calendar-days">
                            {{ $report->date->format('d/m/Y') }}
                        </x-report-item-info>
                        <x-report-item-info label="Usuário atendido">
                            {{ $report->related->author_name }}
                        </x-report-item-info>
                    </x-slot>
                    <x-slot name="content">
                        <x-report-item-enum :value="$report->related->via"></x-report-item-enum>
                        <x-report-item-info label="contato do usuário">
                            {{ $report->related->author_contact }}
                        </x-report-item-info>
                        <x-report-item-info label="relato do usuário">
                            {{ $report->related->description }}
                        </x-report-item-info>
                        <x-report-item-info label="Colaborador">
                            {{ $report->user->name }}
                        </x-report-item-info>
                    </x-slot>
                </x-report-item>
            @empty
                <p role="listitem">{{ __('reports.empty') }}</p>
            @endforelse
            {{ $reports?->links('components.nav-pages') }}
        </div>
    @endif
</div>
