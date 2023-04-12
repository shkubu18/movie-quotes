<x-layout>
    <x-move-back path="/" />

    <x-dashboard.container>
        <x-dashboard.title>{{ __('dashboard.movies_dashboard') }}</x-dashboard.title>

        @if($movies->count())
            <x-dashboard.quantity>{{ __('hint.movies_qty') . ": " . $movies->count()  }}</x-dashboard.quantity>

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
