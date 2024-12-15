@guest
    <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
        {{ __('home_lang.login') }}
    </x-nav-link>
    <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
        {{ __('home_lang.register') }}
    </x-nav-link>
@endguest
