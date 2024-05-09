<x-report-item :report="$report">
    <x-slot name="fixed">
        <x-report-item-info icon="heroicon-o-calendar-days">
            {{ $report->date->format('d/m/Y') }}
        </x-report-item-info>
        <x-report-item-info label="Técnico responsável">
            {{ $report->related->tech_name }}
        </x-report-item-info>
    </x-slot>
    <x-slot name="content">
        <x-report-item-info label="contato do técnico responsável">
            {{ $report->related->tech_contact }}
        </x-report-item-info>
        <x-report-item-info label="Para onde foi encaminhado">
            {{ $report->related->forwarded_location }}
        </x-report-item-info>
        <x-report-item-info label="Colaborador">
            {{ $report->user->name }}
        </x-report-item-info>
    </x-slot>
</x-report-item>
