@auth
    <header class="text-lg font-medium mx-5 text-center bg-gray-400 p-6 rounded-xl">
        <a class="mr-4" href="/movies/create">{{ __('header.add_movie') }}</a>
        <a class="mr-4" href="/quotes/create">{{ __('header.add_quote') }}</a>
        <a class="mr-4" href="/movies/dashboard">{{ __('header.movies_panel') }}</a>
        <a class="mr-4" href="/quotes/dashboard">{{ __('header.quotes_panel') }}</a>

        <button form="logout-form" type="submit">{{ __('auth.logout') }}</button>
        <form id="logout-form" class="hidden" action="/logout" method="POST">
            @csrf
        </form>
    </header>
@else
    <div class="flex justify-center">
        <a class="mb-5 underline text-xl" href="/login">{{ __('auth.login') }}</a>
    </div>
@endauth
