@props([
    'type' => 'text',
    'placeholder' => '',
    'label' => '',
])

@php($name = $attributes->whereStartsWith('wire:model')->first() ? $attributes->get('wire:model') : $attributes->get('name'))

<div class="flex flex-col bg-white p-2 rounded-xl">
    @isset($label)
        <div class="flex text-primary p-2 rounded-xl uppercase font-extrabold">
            {{$label}}
        </div>
    @endisset
    <div class="flex gap-1">
        @isset($icon)
            <div class="p-2 flex justify-center items-center bg-primary-light rounded-xl">
                <div class="w-6">
                    @svg($icon,  ['class' => "text-primary"])
                </div>
            </div>
        @endisset
        <div class="p-2 {{!isset($icon) ? 'text-black' : 'font-extrabold text-primary'}} bg-primary-light rounded-xl w-full">
            @if($type === 'textarea')
                <textarea {{ $attributes }} class="bg-primary-light border-none w-full p-1 focus:ring-secondary"></textarea>
            @else
                <input
                        {{ $attributes }}
                        type="{{$type}}"
                        placeholder="{{$placeholder ?? ''}}"
                        class="bg-primary-light border-none w-full p-1 focus:ring-secondary"
                >
            @endif
        </div>
    </div>
    <x-input-error :for="$name" class="mt-2" />
</div>
