<x-app-layout title="Home Page">
    @section('hero')
        <div class="w-full text-center py-36">
            <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-gray-700">
                {{ __('home_lang.welcome' ) }} <span class="text-yellow-500">&lt;HiZo /&gt;</span> <span class="text-gray-900"> {{ __('home_lang.news' ) }}</span>
            </h1>
            <p class="text-gray-500 text-lg mt-1">{{ __( 'home_lang.best_blog' ) }}</p>
            <a class="px-3 py-2 text-lg text-white bg-gray-800 rounded mt-5 inline-block"
                href="{{route('posts.index')}}"> {{__('home_lang.start_reading')}} </a>
        </div>
    @endsection


    <div class="mb-10">
        @if ($featuredPost->isNotEmpty())
            <div class="mb-16">
                <h2 class="mt-16 mb-5 text-3xl text-yellow-500 font-bold">{{ __('home_lang.featured_posts') }}</h2>
                <div class="w-full">
                    <div class="grid grid-cols-3 gap-10 w-full">
                        @foreach ($featuredPost as $post)
                            <div class="md:col-span-1 col-span-3">
                                <x-posts.post-card :post="$post"/>
                            </div>
                        @endforeach
                    </div>
                </div>
                <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold"
                    href="{{route('posts.index')}}">{{ __('home_lang.more_posts') }}</a>
            </div>
        @endif
        <hr>

        @if ($latestPost->isNotEmpty())
        <h2 class="mt-16 mb-5 text-3xl text-yellow-500 font-bold">{{ __('home_lang.latest_posts') }}</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-3 gap-10 w-full">
                @foreach ($latestPost as $post)
                    <div class="md:col-span-1 col-span-3">
                        <x-posts.post-card :post="$post" />
                    </div>
                @endforeach
            </div>
        </div>
        <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold" href="{{route('posts.index')}}">{{ __('home_lang.more_posts') }}</a>
        @endif
    </div>



</x-app-layout>
