<x-slot:fixed>
    <x-report-item-info label="Assunto da situação problema">
        {{ $report->related->subject }}
    </x-report-item-info>
</x-slot:fixed>

<x-slot:content>
    <x-report-item-info label="Relato da situação problema">
        {{ $report->related->description }}
    </x-report-item-info>
</x-slot:content>
