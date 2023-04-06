@props(['quote'])

@if($quote)
    <div class="flex items-center justify-center flex-col">
        <img
            class="w-7/12 rounded-lg my-5 object-cover"
            src="{{ asset('storage/' . $quote->movie_picture) }}"
            alt="movie picture"
        />
        <h1 class="text-3xl mx-5 text-center">{{ '"' .  $quote->getTranslation('name', app()->getLocale()) . '"' }}</h1>
        <a
            href="/movies/{{ $quote->movie->slug }}"
            class="underline mt-10 text-3xl mx-5 text-center"
        >
            {{ $quote->movie->getTranslation('name', app()->getLocale()) }}
        </a>
    </div>
@endif
