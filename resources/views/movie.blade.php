<x-layout>
    <div class="min-h-screen flex items-center justify-center flex-col">
        <h1>{{ $movie->name }}</h1>
        @foreach($quotes as $quote)
            <img
                class="w-2/5 rounded"
                src="{{ asset('storage/' . $quote->movie_picture) }}"
                alt="movie picture"
            />
            <h1>{{ $quote->name }}</h1>
        @endforeach
    </div>
</x-layout>
