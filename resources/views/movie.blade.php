<x-layout>
    <div class="min-h-screen flex items-center justify-center flex-col">
        <h1>{{ $movie->getTranslation('name', app()->getLocale()) }}</h1>
        @foreach($quotes as $quote)
            <img
                class="w-2/5 rounded"
                src="{{ asset('storage/' . $quote->movie_picture) }}"
                alt="movie picture"
            />
            <h1>{{ $quote->getTranslation('name', app()->getLocale()) }}</h1>
        @endforeach
    </div>
</x-layout>
