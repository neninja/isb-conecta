<x-slot:fixed>
    <x-report-item-info label="Assunto do gasto extra">
        {{ $report->related->subject }}
    </x-report-item-info>
</x-slot:fixed>

<x-slot:content>
    <x-report-item-info label="Retorno das familias">
        {{ $report->related->family_feedback }}
    </x-report-item-info>
</x-slot:content>
