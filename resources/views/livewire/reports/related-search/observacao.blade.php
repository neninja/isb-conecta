<x-slot:fixed>
    <x-report-item-info label="Assunto da observação">
        {{ $report->related->subject }}
    </x-report-item-info>
</x-slot:fixed>

<x-slot:content>
    <x-report-item-info label="relato da observação">
        {{ $report->related->description }}
    </x-report-item-info>
</x-slot:content>
