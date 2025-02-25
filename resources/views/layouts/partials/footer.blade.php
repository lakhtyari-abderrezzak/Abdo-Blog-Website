<footer class="text-sm space-x-4 flex items-center border-t border-gray-100 flex-wrap justify-around py-4 ">
    <div class="flex gap-2">
        <a href="{{ route('locale', 'en') }}"><x-flag-language-en class="w-6 h-6" /></a>
        <a href="{{ route('locale', 'ar') }}"><x-flag-language-ar class="w-6 h-6" /></a>
        <a href="{{ route('locale', 'fr') }}"><x-flag-language-fr class="w-6 h-6" /></a>
    </div>
    <div class="flex space-x-3">
        <a class="text-gray-500 hover:text-yellow-500" href="">{{ __('home_lang.blog') }}</a>
        @guest
            <a class="text-gray-500 hover:text-yellow-500" href=""> {{ __('home_lang.login') }} </a>
            <a class="text-gray-500 hover:text-yellow-500" href="">{{ __('home_lang.register') }}</a>
    @endguest
</div>
</footer>
