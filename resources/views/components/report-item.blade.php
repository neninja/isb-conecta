<div role="listitem" class="bg-white p-2 rounded-2xl flex flex-col gap-2" x-data="{collapsed: false}">
    <div class="bg-primary uppercase cursor-pointer select-none text-white font-bold p-3 rounded-xl flex justify-between" @click="collapsed = !collapsed">
        <p>
        {{ $report->related->label }}
        </p>
        <x-heroicon-m-chevron-double-down x-show="!collapsed" class="text-white w-6" />
        <x-heroicon-m-chevron-double-up x-show="collapsed" class="text-white w-6" />
    </div>
    <div class="flex flex-col gap-2">
        {{$fixed}}
    </div>
    <div class="flex flex-col gap-2" x-show="collapsed" x-transition.opacity>
        {{$content}}
    </div>
</div>
