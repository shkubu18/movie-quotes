@props(['quote'])

@if($quote)
        <img
            class="rounded-lg my-7 object-cover w-[500px] h-[300px]"
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
@endif
