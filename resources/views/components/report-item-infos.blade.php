<div class="flex flex-col">
    @isset($label)
    <div class="flex text-primary p-2 rounded-xl uppercase font-extrabold">
        {{$label}}
    </div>
    @endisset
    <div class="flex flex-col gap-1">
        @foreach($items as $item)
            <div class="p-2 text-black bg-primary-light rounded-xl w-full">
                {{$item}}
            </div>
        @endforeach
    </div>
</div>
