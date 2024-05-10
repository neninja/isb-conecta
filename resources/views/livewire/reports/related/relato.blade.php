<x-slot:fixed>
    <x-report-item-info label="Assunto do relato">
        {{ $report->related->subject }}
    </x-report-item-info>
</x-slot:fixed>

<x-slot:content>
    <x-report-item-info label="Especificação do relato">
        {{ $report->related->description }}
    </x-report-item-info>
</x-slot:content>
