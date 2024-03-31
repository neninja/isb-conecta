@props([
    'disabled' => false,
    'isOutlined' => false,
])

@php
    $name = $attributes->whereStartsWith('wire:model')->first() ? $attributes->get('wire:model') : $attributes->get('name');
@endphp

@if($isOutlined)
<div class="relative z-0">
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block pt-2.5 pb-1 px-0 w-full text-neutral-low bg-transparent border-0 border-b-[1px] border-neutral-low-medium appearance-none focus:border-primary focus:outline-none focus:ring-0 focus:border-primary peer']) !!} name="{{$name}}" placeholder="" id="{{$name}}">
    <label for="{{$name}}" class="absolute font-semibold text-sm text-neutral-low-medium duration-300 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-primary peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{$attributes->get('label')}}</label>
</div>
@else
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
@endif
