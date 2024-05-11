<x-slot:fixed>
    <x-report-item-info icon="heroicon-o-currency-dollar" label="Valor disponível">
        {{ currency($report->related->amount/100) }}
    </x-report-item-info>
</x-slot:fixed>

<x-slot:content>
    <x-report-item-enum :value="$report->related->sponsor"></x-report-item-enum>
    <x-report-item-info label="Informações extras">
        {{ $report->related->description }}
    </x-report-item-info>
</x-slot:content>
