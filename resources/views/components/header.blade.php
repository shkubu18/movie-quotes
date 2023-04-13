@auth
    <header class="text-lg font-medium mx-5 text-center bg-gray-400 p-6 rounded-xl">
        <a class="mr-4" href="{{ route('movies.create') }} ">{{ __('header.add_movie') }}</a>
        <a class="mr-4" href="{{ route('quotes.create') }}">{{ __('header.add_quote') }}</a>
        <a class="mr-4" href="{{ route('movies.index') }}">{{ __('header.movies_panel') }}</a>
        <a class="mr-4" href="{{ route('quotes.index') }}">{{ __('header.quotes_panel') }}</a>

        <button form="logout-form" type="submit">{{ __('auth.logout') }}</button>
        <form id="logout-form" class="hidden" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </header>
@endauth
