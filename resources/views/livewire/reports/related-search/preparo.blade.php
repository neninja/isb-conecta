<x-slot:content>
    <x-report-item-enum :value="$report->related->status"></x-report-item-enum>
    <x-report-item-infos amountKey="amount" label="Alimentos preparados" :items="$report->related->items"></x-report-item-infos>
    <x-report-item-info label="informações extras">
        {{ $report->related->description }}
    </x-report-item-info>
</x-slot:content>
