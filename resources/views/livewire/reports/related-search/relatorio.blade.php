<x-slot:fixed>
    <x-report-item-info label="Assunto do relatório">
        {{ $report->related->subject }}
    </x-report-item-info>
</x-slot:fixed>

<x-slot:content>
    <x-report-item-enum :value="$report->related->diary"></x-report-item-enum>
    <x-report-item-info label="Especificação do relatório">
        {{ $report->related->description }}
    </x-report-item-info>
</x-slot:content>
