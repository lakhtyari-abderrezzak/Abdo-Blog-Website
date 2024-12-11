@guest
    <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
        {{ __('Login') }}
    </x-nav-link>
    <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
        {{ __('Register') }}
    </x-nav-link>
@endguest
