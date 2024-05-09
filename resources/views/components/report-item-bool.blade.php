<div class="flex gap-2" x-data="{selectedCase: '{{$value}}'}">
    <div class="w-full rounded-2xl text-white p-3 font-bold uppercase text-center" :class="selectedCase ? 'bg-primary' : 'bg-primary-light'">
        Sim
    </div>
    <div class="w-full rounded-2xl text-white p-3 font-bold uppercase text-center" :class="!selectedCase ? 'bg-primary' : 'bg-primary-light'">
        Não
    </div>
</div>
