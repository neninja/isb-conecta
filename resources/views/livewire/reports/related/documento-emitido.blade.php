<x-slot:fixed>
    <x-report-item-info label="Assunto da documentação">
        {{ $report->related->subject }}
    </x-report-item-info>
</x-slot:name>

<x-slot:content>
    <x-report-item-info label="Especificação do documento">
        {{ $report->related->description }}
    </x-report-item-info>
</x-slot:content>
