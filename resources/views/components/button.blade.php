@props([
    'color' => 'primary',
    'full' => false,
])

@php
    $colorClasses = match($color) {
        default => "text-neutral-high bg-$color focus:ring-$color hover:brightness-90 focus:brightness-90 active:brightness-75",
    };

    $widthClasses = $full ? 'w-full' : 'w-min';
@endphp

<button {{ $attributes->merge(['type' => 'submit', 'class' => "whitespace-nowrap inline-flex justify-center px-4 py-2 border border-transparent rounded-xl shadow font-bold uppercase focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 $colorClasses $widthClasses disabled:opacity-50" ]) }}>
    {{ $slot }}
</button>
