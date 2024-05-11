<x-slot:fixed>
    <x-report-item-info label="Assunto da tarefa">
        {{ $report->related->subject }}
    </x-report-item-info>
</x-slot:fixed>

<x-slot:content>
    <x-report-item-bool :value="$report->related->requested"></x-report-item-bool>
    <x-report-item-info label="Especificação da tarefa">
        {{ $report->related->description }}
    </x-report-item-info>
</x-slot:content>
