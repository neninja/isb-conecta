<x-slot:fixed>
    <x-report-item-info label="Orgão doador">
        {{ $report->related->donator }}
    </x-report-item-info>
</x-slot:name>

<x-slot:content>
    <x-report-item-info label="Especificação da doação">
        {{ $report->related->description }}
    </x-report-item-info>
</x-slot:content>
