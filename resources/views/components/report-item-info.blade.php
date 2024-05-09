<div class="flex flex-col">
    @isset($label)
    <div class="flex text-primary p-2 rounded-xl uppercase font-extrabold">
        {{$label}}
    </div>
    @endisset
    <div class="flex gap-1">
        @isset($icon)
            <div class="p-2 flex justify-center items-center bg-primary-light rounded-xl">
                <div class="w-5">
                    @svg($icon,  ['class' => "text-primary"])
                </div>
            </div>
        @endisset
        <div class="p-2 {{!isset($icon) ? 'text-black' : 'font-extrabold text-primary'}} bg-primary-light rounded-xl w-full">
            {{$slot}}
        </div>
    </div>
</div>
