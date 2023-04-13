<x-layout>
    <x-move-back path="{{ route('quotes.show') }}" />

    <x-dashboard.container>
        <x-dashboard.title>{{ __('dashboard.movies_dashboard') }}</x-dashboard.title>

        @if($movies->count())
            <div class="flex justify-between text-gray-700 w-full mb-2 bg-slate-100 p-2.5 rounded-xl">
                <x-dashboard.quantity>{{ __('hint.movies_qty') . ": " . $movies->count()  }}</x-dashboard.quantity>
                <a class="underline" href="{{ route('movies.create') }} ">{{ __('header.add_movie') }}</a>
            </div>

            <div class="w-full text-indigo-600 mt-5 mb-1 ml-4">
                <p>{{ __('dashboard.movie_name') }}</p>
            </div>
            @foreach($movies as $movie)
                <x-dashboard.item :loop="$loop">
                    <a class="mr-5 font-medium m-2.5 truncate" href="/movie/{{ $movie->slug }}">
                        {{ $movie->getTranslation('name', app()->getLocale()) }}
                    </a>
                    <div class="flex">
                        <a class="mr-5 text-indigo-600" href="/movies/{{ $movie->id }}/edit">
                            {{ __('dashboard.edit') }}
                        </a>
                        <form action="/movies/{{ $movie->id }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <x-dashboard.delete-button />
                        </form>
                    </div>
                </x-dashboard.item>
            @endforeach

            @else
                <p class="text-center text-gray-500">{{ __('hint.movies_dont_exists') }}</p>
        @endif
    </x-dashboard.container>
</x-layout>
