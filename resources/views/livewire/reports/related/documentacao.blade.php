<x-report-item :report="$report">
    <x-slot name="fixed">
        <x-report-item-info icon="heroicon-o-calendar-days">
            {{ $report->date->format('d/m/Y') }}
        </x-report-item-info>
        <x-report-item-info label="Assunto da documentação">
            {{ $report->related->subject }}
        </x-report-item-info>
    </x-slot>
    <x-slot name="content">
        <x-report-item-enum :value="$report->related->status"></x-report-item-enum>
        <x-report-item-info label="Especificação da documentação">
            {{ $report->related->description }}
        </x-report-item-info>
        <x-report-item-info label="Colaborador">
            {{ $report->user->name }}
        </x-report-item-info>
    </x-slot>
</x-report-item>
