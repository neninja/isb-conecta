<div class="flex {{!isset($icon) ? 'flex-col' : 'gap-1'}}">
    @isset($icon)
    <div class="flex bg-primary-light p-2 rounded-xl">
        <div class="w-5 flex">
            @svg($icon,  ['class' => "text-primary"])
        </div>
    </div>
    @else
    <div class="flex text-primary p-2 rounded-xl uppercase font-extrabold">
        {{$label}}
    </div>
    @endisset
    <div class="p-2 {{!isset($icon) ? 'text-black' : 'font-extrabold text-primary'}} bg-primary-light rounded-xl w-full">
        {{$slot}}
    </div>
</div>
