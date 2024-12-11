@props(['author', 'size'])

@php
    $imageSize = match ($size ?? null) {
        'sm' => 'w-6 h-6',
        'md' => 'w-10 h-10',
        'lg' => 'w-12 h-12',
        default => 'w-6 h-6',
    };

    $textSize = match ($size ?? null) {
        'sm' => 'text-xs',
        'md' => 'text-sm',
        'lg' => 'text-base',
        default => 'text-sm',
    }
@endphp

<img class="{{$imageSize}} rounded-full mr-3" src="{{ $author->profile_photo_url }}" alt="{{ $author->name }}">
<span class="mr-1 {{$textSize}}">{{ $author->name }}</span>
