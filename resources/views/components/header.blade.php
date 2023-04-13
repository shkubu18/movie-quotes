@auth
    <header class="text-lg font-medium text-center absolute top-0.5 border-x-2 right-0 border-b-2 rounded border-gray-300">
        <a class="hover:bg-indigo-600 rounded duration-300 border-r-4 border-indigo-600 p-1.5" href="{{ route('movies.index') }}">
            {{ __('header.movies_panel') }}
        </a>
        <a class="hover:bg-indigo-600 rounded duration-300 border-r-4 border-indigo-600 p-1.5" href="{{ route('quotes.index') }}">
            {{ __('header.quotes_panel') }}
        </a>

        <button
            class="py-0.5 px-1.5 rounded text-white hover:bg-slate-100 hover:text-indigo-600 duration-300"
            form="logout-form"
            type="submit"
        >
            {{ __('auth.logout') }}
        </button>
        <form id="logout-form" class="hidden" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </header>
@endauth
