<x-layout>
    <div class="flex">
        <a href="{{ route('language.set', ['lang' => 'en']) }}" class="mr-3">EN</a>
        <a href="{{ route('language.set', ['lang' => 'ka']) }}">KA</a>
    </div>
@auth
        <div class="text-center">
            <h1 class="font-bold text-center">
                {{ __('header.welcome', [], session('language')) }} {{ auth()->user()->name }}!
            </h1>
            <a
                class="underline mr-5"
                href="/admin/movies/create"
            >{{ __('header.add_movie', [], session('language')) }}
            </a>
            <a
                class="underline mr-5"
                href="/admin/quotes/create"
            >{{ __('header.add_quote', [], session('language')) }}
            </a>
            <a
                class="underline mr-5"
                href="/admin/movies/dashboard"
            >{{ __('header.movies_panel', [], session('language')) }}
            </a>
            <a
                class="underline mr-5"
                href="/admin/quotes/dashboard"
            >{{ __('header.quotes_panel', [], session('language')) }}
            </a>

            <button
                form="logout-form"
                class="underline"
                type="submit"
            >{{ __('auth.logout', [], session('language')) }}
            </button>
            <form id="logout-form" class="hidden" action="/logout" method="POST">
                @csrf
            </form>
        </div>
        @else
        <div class="flex justify-center">
            <a class="mb-5 underline text-xl" href="/login">{{ __('auth.login', [], session('language')) }}</a>
        </div>
    @endauth

    @if($quote)
        <div class="min-h-screen flex items-center justify-center flex-col">
            <img
                class="w-2/5 rounded"
                src="{{ asset('storage/' . $quote->movie_picture) }}"
                alt="movie picture"
            />
            <h1>{{ $quote->getTranslation('name', session('language')) }}</h1>
            <a
                href="/movies/{{ $quote->movie->slug }}"
                class="underline"
            >
                {{ $quote->movie->getTranslation('name', session('language')) }}
            </a>
        </div>
    @endif
</x-layout>
