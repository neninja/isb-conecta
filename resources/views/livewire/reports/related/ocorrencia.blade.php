<x-slot:fixed>
    <x-report-item-enum :value="$report->related->type"></x-report-item-enum>
</x-slot:fixed>

<x-slot:content>
    <x-report-item-info label="Assunto da observação">
        {{ $report->related->subject }}
    </x-report-item-info>
    <x-report-item-info label="relato do usuário">
        {{ $report->related->description }}
    </x-report-item-info>
</x-slot:content>
