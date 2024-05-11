@php($model = $attributes->whereStartsWith('wire:model')->first())

<div class="flex flex-col gap-2 bg-white p-2 rounded-xl">
    @isset($label)
        <div class="flex text-primary p-2 rounded-xl uppercase font-extrabold">
            {{$label}}
        </div>
    @endisset
    <div class="flex gap-2">
        @foreach($enum::cases() as $case)
            <label class="w-full rounded-2xl p-3 font-bold uppercase text-center cursor-pointer has-[:checked]:bg-primary bg-primary-light has-[:checked]:text-neutral-high-light  text-neutral-low-dark">
                {{$case->label()}}
                <input type="radio" class="invisible" {{$attributes}} value="{{$case->value}}">
            </label>
        @endforeach
    </div>
    <x-input-error :for="$model" class="mt-2" />
</div>
