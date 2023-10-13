@props(['textColor', 'bgColor'])

@php
    $textColor = match ($textColor) {
        'gray' => 'text-gray-400',
        'blue' => 'text-blue-400',
        'red' => 'text-red-400',
        'yellow' => 'text-yellow-400',
        default => 'text-gray-400',
    };
    $bgColor = match ($bgColor) {
        'gray' => 'bg-gray-800',
        'blue' => 'bg-blue-900',
        'red' => 'bg-red-900',
        'yellow' => 'bg-yellow-900',
        default => 'bg-gray-900',
    };
@endphp

<button {{ $attributes }} class="{{ $textColor }} {{ $bgColor }} rounded-xl px-3 py-1 text-base">
    {{ $slot }}
</button>