<x-layout>
    <a class="absolute m-5 underline text-lg" href="/">{{ __('hint.back') }}</a>

    <x-dashboard.container>
            <h1 class="text-3xl text-indigo-600 mb-10 text-center">{{ __('dashboard.movies_dashboard') }}</h1>
            @foreach($movies as $movie)
                <x-dashboard.item :loop="$loop">
                    <a
                        class="mr-5 font-medium m-2.5"
                        href="/movies/{{ $movie->slug }}"
                    >
                        {{ $movie->getTranslation('name', app()->getLocale()) }}
                    </a>
                    <div class="flex">
                        <a class="mr-5 text-indigo-600" href="/admin/movies/{{ $movie->id }}/edit">{{ __('dashboard.edit') }}</a>
                        <form action="/admin/movies/{{ $movie->id }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="text-gray-400">{{ __('dashboard.delete') }}</button>
                        </form>
                    </div>
                </x-dashboard.item>
            @endforeach
    </x-dashboard.container>
</x-layout>
