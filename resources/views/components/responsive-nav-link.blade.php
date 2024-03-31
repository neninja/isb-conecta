@props(['active'])

@php
$classes = 'w-full p-2 text-primary font-extrabold uppercase bg-neutral-high rounded-xl group-hover:text-neutral-low-dark';

if ($active ?? false) $classes .= ' block w-full ps-3 pe-4 py-2 border';
@endphp

<div class="flex gap-1 group">
    <div class="flex bg-neutral-high p-2 rounded-xl">
        <div class="w-5 flex">
            {{$icon}}
        </div>
    </div>
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</div>
