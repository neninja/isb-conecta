<div class="flex flex-col">
    @isset($label)
    <div class="flex text-primary p-2 rounded-xl uppercase font-extrabold">
        {{$label}}
    </div>
    @endisset
    <div class="{{isset($amountKey) ? 'grid grid-cols-[auto_1fr]' : 'flex flex-col'}} gap-1">
        @foreach($items as $item)
            @isset($amountKey)
                <div class="p-2 flex justify-center items-center bg-primary-light rounded-xl">
                    {{$item['amount']}}
                </div>
            @endisset
            <div class="p-2 text-black bg-primary-light rounded-xl w-full">
                {{$item['description'] ?? $item}}
            </div>
        @endforeach
    </div>
</div>
