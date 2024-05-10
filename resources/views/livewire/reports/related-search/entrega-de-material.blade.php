<x-slot:fixed>
    <x-report-item-info label="Para quem foi entregue">
        {{ $report->related->receiver_name }}
    </x-report-item-info>
</x-slot:fixed>

<x-slot:content>
    <x-report-item-info label="Especificação do material entregue">
        {{ $report->related->description }}
    </x-report-item-info>
</x-slot:content>
