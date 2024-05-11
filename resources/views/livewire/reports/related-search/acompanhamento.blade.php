<x-slot:fixed>
    <x-report-item-info label="Assunto">
        {{ $report->related->subject }}
    </x-report-item-info>
</x-slot:fixed>

<x-slot:content>
    <x-report-item-info label="Rede de acompanhamento">
        {{ $report->related->network }}
    </x-report-item-info>
    <x-report-item-info label="relato do usuário">
        {{ $report->related->description }}
    </x-report-item-info>
</x-slot:content>
