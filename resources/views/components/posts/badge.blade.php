@props(['bgColor', 'textColor'])

@php
    $textColor = match ($textColor){
        'gray' => 'text-gray-800',
        'red' => 'text-red-800',
        'pink' => 'text-pink-800',
        'blue' => 'text-blue-800',
        'black' => 'text-black-800',
        'white' => 'text-white-800',
        'yellow' => 'text-yellow-800',
        default => 'text-white-800',
    };

    $bgColor = match ($bgColor){
        'gray' => 'bg-gray-100',
        'red' => 'bg-red-100',
        'pink' => 'bg-pink-100',
        'blue' => 'bg-blue-100',
        'black' => 'bg-black-100',
        'white' => 'bg-white-100',
        'yellow' => 'bg-yellow-100',
        default => 'bg-red-100'
    };
@endphp
<button {{ $attributes }}
    class=" {{$textColor}} {{$bgColor}}  rounded-xl px-3 py-1 m-1 text-base">
    {{ $slot }}
</button>
