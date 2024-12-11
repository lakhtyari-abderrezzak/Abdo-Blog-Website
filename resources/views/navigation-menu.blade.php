<nav class="flex items-center justify-between py-3 px-6 border-b border-gray-100">
    <div id="nav-left" class="flex items-center">
        <a href="/"><x-application-logo /></a>
        <div class="top-menu ml-10">
            <div class="flex space-x-4" >
                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('home') }}
                </x-nav-link>
                <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                    {{ __('Blog') }}
                </x-nav-link>
            </div>
        </div>
    </div>
    <div id="nav-right" class="flex items-center md:space-x-6">
        <div class="flex space-x-5">
            @include('layouts.partials.header-right-guest')
            @include('layouts.partials.header-right-auth')
        </div>
    </div>
</nav>
