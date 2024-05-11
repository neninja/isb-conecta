<x-slot:fixed>
    <x-report-item-info label="Assunto da documentação">
        {{ $report->related->subject }}
    </x-report-item-info>
</x-slot:fixed>

<x-slot:content>
    <x-report-item-enum :value="$report->related->status"></x-report-item-enum>
    <x-report-item-info label="Especificação da documentação">
        {{ $report->related->description }}
    </x-report-item-info>
</x-slot:content>
