<x-slot:fixed>
    <x-report-item-info label="Assunto da atividade">
        {{ $report->related->subject }}
    </x-report-item-info>
</x-slot:fixed>

<x-slot:content>
    <x-report-item-infos label="Materiais" :items="$report->related->items"></x-report-item-infos>
    <x-report-item-info label="Especificações da atividade">
        {{ $report->related->description }}
    </x-report-item-info>
</x-slot:content>
