<x-layout>
    <div class="min-h-screen flex items-center justify-center flex-col">
        <img
            class="w-2/5 rounded"
            src="{{ asset('storage/' . $quote->movie_picture) }}"
            alt="movie picture"
        />
        <h1>{{ $quote->name }}</h1>
    </div>
</x-layout>
