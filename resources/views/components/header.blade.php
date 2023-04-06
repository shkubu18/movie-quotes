@auth
    <header class="text-lg mx-5 text-center">
            <a class="underline" href="/admin/movies/create">{{ __('header.add_movie') . " /" }}</a>
            <a class="underline" href="/admin/quotes/create">{{ __('header.add_quote') . " /"  }}</a>
            <a class="underline" href="/admin/movies/dashboard">{{ __('header.movies_panel') . " /"  }}</a>
            <a class="underline" href="/admin/quotes/dashboard">{{ __('header.quotes_panel') . " /"  }}</a>
        <button form="logout-form" class="underline" type="submit">{{ __('auth.logout') }}</button>
        <form id="logout-form" class="hidden" action="/logout" method="POST">
            @csrf
        </form>
    </header>
@else
    <div class="flex justify-center">
        <a class="mb-5 underline text-xl" href="/login">{{ __('auth.login') }}</a>
    </div>
@endauth
