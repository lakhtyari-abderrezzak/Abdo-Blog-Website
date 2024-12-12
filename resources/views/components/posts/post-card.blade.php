@props(['post'])
<div class="">
    <a wire:navigate href="{{ route('posts.show', $post->slug) }}">
        <div>
            <img class="w-full rounded-xl" src="{{ $post->getThumbnailsImage() }}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2">
            @if ($category = $post->categories->first())
                <x-posts.badge
                    href="{{ route('posts.index', ['category'=>$category->title])}}" 
                    wire:navigate 
                    bgColor="{{ $category->bg_color }}" 
                    textColor="{{ $category->text_color }}">
                    {{$category->title}}
                </x-posts.badge>
            @endif

            <p class="text-gray-500 text-sm">{{ $post->featured_at }}</p>
        </div>
        <a wire:navigate href="{{ route('posts.show', $post->slug) }}" class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
    </div>

</div>
