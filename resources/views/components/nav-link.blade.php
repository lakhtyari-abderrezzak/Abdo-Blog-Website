@props(['active', 'navigate'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 hover:text-yellow-900 text-sm text-yellow-500'
            : 'inline-flex items-center px-1 pt-1 hover:text-yellow-900 text-sm text-gray-500';
@endphp

<a {{ $navigate ?? true ? 'wire:navigate' : '' }} {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
