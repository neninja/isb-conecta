<x-slot:fixed>
    <x-report-item-info label="Para quem foi solicitado">
        {{ $report->related->author_name }}
    </x-report-item-info>
</x-slot:fixed>

<x-slot:content>
    <x-report-item-enum :value="$report->related->status"></x-report-item-enum>
    <x-report-item-info label="contato do usuário">
        {{ $report->related->author_contact }}
    </x-report-item-info>
    <x-report-item-info label="relato do usuário">
        {{ $report->related->description }}
    </x-report-item-info>
</x-slot:content>
