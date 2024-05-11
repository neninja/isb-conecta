<div class="flex gap-2" x-data="{selectedCase: '{{$value}}'}">
    @foreach($value->cases() as $case)
    <div class="w-full rounded-2xl text-white p-3 font-bold uppercase text-center" :class="selectedCase == '{{$case}}' ? 'bg-primary' : 'bg-primary-light'">
        {{$case->label()}}
    </div>
    @endforeach
</div>
