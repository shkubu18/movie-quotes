<x-layout>
    <x-container>
        <x-header/>
        @if($quote)
            <img
                class="rounded-lg my-7 object-cover w-[500px] h-[300px]"
                src="{{ asset('storage/' . $quote->picture) }}"
                alt="movie picture"
            />
            <h1 class="text-3xl mx-5 text-center">
                {{ '"' .  $quote->getTranslation('name', app()->getLocale()) . '"' }}
            </h1>
            <a href="/movie/{{ $quote->movie->slug }}" class="underline mt-10 text-3xl mx-5 text-center">
                {{ $quote->movie->getTranslation('name', app()->getLocale()) }}
            </a>
            @else
                <p class="text-center text-amber-200 mt-5">{{ __('hint.quotes_dont_exists') }}</p>
        @endif
    </x-container>
</x-layout>
