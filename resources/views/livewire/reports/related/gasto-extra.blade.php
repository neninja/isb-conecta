<x-slot:fixed>
    <x-report-item-info label="Assunto do gasto extra">
        {{ $report->related->subject }}
    </x-report-item-info>
</x-slot:fixed>

<x-slot:content>
    <x-report-item-info icon="heroicon-o-currency-dollar" label="Valor go gasto extra">
        {{ currency($report->related->amount/100) }}
    </x-report-item-info>
    <x-report-item-info label="Informações extras">
        {{ $report->related->description }}
    </x-report-item-info>
</x-slot:content>
