<x-layout>
    @if($quote)
        <div class="min-h-screen flex items-center justify-center flex-col">
            <a class="mb-5 underline text-xl" href="/login">Login</a>
            {{-- Test image --}}
            <img src="https://server5.intermedia.ge/article_images/small/201905/2019051700011137332.jpg"
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
        <a class="text-center" href="/login">Login</a>
        <p class="text-center">No quotes yet. Please check back later.</p>
    @endif
</x-layout>
