<x-slot:fixed>
    <x-report-item-info label="Assunto da atividade">
        {{ $report->related->subject }}
    </x-report-item-info>
</x-slot:fixed>

<x-slot:content>
    <x-report-item-info label="Relato da atividade">
        {{ $report->related->descripiotn }}
    </x-report-item-info>
</x-slot:content>
