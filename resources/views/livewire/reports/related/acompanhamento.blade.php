<x-report-item :report="$report">
    <x-slot name="fixed">
        <x-report-item-info icon="heroicon-o-calendar-days">
            {{ $report->date->format('d/m/Y') }}
        </x-report-item-info>
        <x-report-item-info label="Assunto">
            {{ $report->related->subject }}
        </x-report-item-info>
    </x-slot>
    <x-slot name="content">
        <x-report-item-info label="Rede de acompanhamento">
            {{ $report->related->network }}
        </x-report-item-info>
        <x-report-item-info label="relato do usuário">
            {{ $report->related->description }}
        </x-report-item-info>
        <x-report-item-info label="Colaborador">
            {{ $report->user->name }}
        </x-report-item-info>
    </x-slot>
</x-report-item>
