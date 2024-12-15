<div id="recommended-topics-box">
    <h3 class="text-lg font-semibold text-gray-900 mb-3">  {{ __('blog_lang.recomended_topcis') }} </h3>
    <div class="topics flex flex-wrap justify-start">
        @foreach ($categories as $category)
            <x-posts.badge wire:navigate
                href="{{ route('posts.index', ['category'=>$category->slug]) }}"
                bgColor="{{$category->bg_color}}" 
                textColor="{{$category->text_color}}" 
            >
                {{ $category->title}}
            </x-posts.badge>
        @endforeach
    </div>
</div>