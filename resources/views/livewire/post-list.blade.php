<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div class="flex items-center">
            @if ($this->activeCategory || $search)
                <x-loader></x-loader>
                <button wire:loading.delay.remove  wire:click="clearFilters()" class=" rounded-full bg-orange-400 text-white mr-2 w-6 h-6">
                    <span>X</span>
                </button>
            @endif
            @if ($this->activeCategory)
                All Posts From :
                <span>
                    <x-posts.badge href="{{ route('posts.index', ['category', $this->activeCategory->slug]) }}"
                        bgColor="{{ $this->activeCategory->bg_color }}"
                        textColor="{{ $this->activeCategory->text_color }}">
                        {{ $this->activeCategory->title }}
                    </x-posts.badge>
                </span>
            @endif
            @if ($search)
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <span>
                    {{ $search }}
                </span>
            @endif
        </div>
        <div class="flex items-center space-x-4 font-light ">
            <button class="{{ $sort === 'asc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4"
                wire:click="sortHelper('desc')">Oldest</button>
            <button class="{{ $sort === 'desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4 "
                wire:click="sortHelper('asc')">Latest</button>

        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
            <x-posts.post-items wire:key="{{'post-item' . $post->id}}" :post="$post" />
        @endforeach
    </div>
    {{ $this->posts->onEachSide(1)->links() }}
</div>
