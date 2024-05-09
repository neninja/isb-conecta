<x-slot:fixed>
    <x-report-item-info label="Assunto da reuniao">
        {{ $report->related->subject }}
    </x-report-item-info>
</x-slot:fixed>

<x-slot:content>
    <x-report-item-info label="Relato da reunião">
        {{ $report->related->description }}
    </x-report-item-info>
</x-slot:content>
