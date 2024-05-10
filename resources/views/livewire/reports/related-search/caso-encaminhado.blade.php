<x-slot:fixed>
    <x-report-item-info label="Técnico responsável">
        {{ $report->related->tech_name }}
    </x-report-item-info>
</x-slot>

<x-slot:content>
    <x-report-item-info label="contato do técnico responsável">
        {{ $report->related->tech_contact }}
    </x-report-item-info>
    <x-report-item-info label="Para onde foi encaminhado">
        {{ $report->related->forwarded_location }}
    </x-report-item-info>
</x-slot:content>
