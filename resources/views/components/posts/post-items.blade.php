@props(['post'])
<article class="[&:not(:last-child)]:border-b border-gray-100 pb-10"
{{ $attributes}} >
    
    <div class="article-body grid grid-cols-12 gap-3 mt-5 items-start">
        <div class="article-thumbnail col-span-4 flex items-center">
            <a wire:navigate href="{{route('posts.show', $post->slug)}}">
                <img class="mw-100 mx-auto rounded-xl" src="{{ $post->getThumbnailsImage() }}" alt="thumbnail">
            </a>
        </div>
        <div class="col-span-8">
            <div class="article-meta flex py-1 text-sm items-center">
                <x-posts.author  :author="$post->author" size="sm" />
                <span class="text-gray-500 text-xs">

                    @if ($post->published_at)
                        {{ $post->published_at->diffForHumans() }}
                    @else
                        <span>Not published yet</span>
                    @endif
                </span>
            </div>
            <h2 class="text-xl font-bold text-gray-900">
                <a wire:navigate href="{{route('posts.show', $post->slug)}}">
                    {{ $post->title }}
                </a>
            </h2>

            <p class="mt-2 text-base text-gray-700 font-light">
                {!! strip_tags(Str::limit( $post->body , 300, '...'), '<b><i><u><strong><em><a>') !!}
            </p>

            <div class="article-actions-bar mt-6 flex items-center justify-between">
                <div class="flex gap-x-2">
                    @foreach ($post->categories as $category)
                        <x-posts.badge wire:navigate href="{{ route('posts.index', ['category' => $category->title]) }}"
                            bgColor="{{ $category->bg_color }}" textColor="{{ $category->text_color }}">
                            {{ $category->title }}
                        </x-posts.badge>
                    @endforeach
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-500 text-sm">{{ $post->getMinRead() }} min read</span>
                    </div>
                </div>
                <div>
                    <livewire:like-button :key="'like-button' . $post->id" :$post  />
                </div>
            </div>
        </div>
    </div>
</article>
