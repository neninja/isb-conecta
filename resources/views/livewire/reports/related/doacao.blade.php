<x-report-item :report="$report">
    <x-slot name="fixed">
        <x-report-item-info icon="heroicon-o-calendar-days">
            {{ $report->date->format('d/m/Y') }}
        </x-report-item-info>
        <x-report-item-info label="Orgão doador">
            {{ $report->related->donator }}
        </x-report-item-info>
    </x-slot>
    <x-slot name="content">
        <x-report-item-info label="Especificação da doação">
            {{ $report->related->description }}
        </x-report-item-info>
        <x-report-item-info label="Colaborador">
            {{ $report->user->name }}
        </x-report-item-info>
    </x-slot>
</x-report-item>
