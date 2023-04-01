<x-layout>
    @auth
        <div class="text-center">
            <h1 class="font-bold text-center">Welcome {{ auth()->user()->name }}!</h1>

            <a class="underline mr-5" href="/admin/movies/create">Add new movie</a>
            <a class="underline mr-5" href="/admin/quotes/create">Add new quote</a>

            <button form="logout-form" class="underline" type="submit">Log Out</button>
            <form id="logout-form" class="hidden" action="/logout" method="POST">
                @csrf
            </form>
        </div>
        @else
        <div class="flex justify-center">
            <a class="mb-5 underline text-xl" href="/login">Login</a>
        </div>
    @endauth

    @if($quote)
        <div class="min-h-screen flex items-center justify-center flex-col">
            <img
                class="w-2/5 rounded"
                src="{{ asset('storage/' . $quote->movie_picture) }}"
                alt="movie picture"
            />
            <h1>{{ $quote->name }}</h1>
            <a
                href="/movies/{{ $quote->movie->slug }}"
                class="underline"
            >
                {{ $quote->movie->name }}
            </a>
        </div>
        @else
        <p class="text-center">No quotes yet. Please check back later.</p>
    @endif
</x-layout>
