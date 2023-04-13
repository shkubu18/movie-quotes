<x-layout>
    <x-move-back path="{{ route('quotes.show') }}" />

    <x-dashboard.container>
        <x-dashboard.title>{{ __('dashboard.quotes_dashboard') }}</x-dashboard.title>

        @if($quotes->count())
            <x-dashboard.header>
                <h2>{{ __('hint.quotes_qty') . ": " . $quotes->count()  }}</h2>
                <a class="underline" href="{{ route('quotes.create') }}">{{ __('header.add_quote') }}</a>
            </x-dashboard.header>

            <div class="w-full flex justify-start mt-5 mb-1 ml-4">
                <div class="flex text-indigo-600 w-1/2 justify-between">
                    <p>{{ __('dashboard.quote_name') }}</p>
                    <p class="mr-2.5">{{ __('dashboard.movie_name') }}</p>
                </div>
            </div>
            @foreach($quotes as $quote)
                <x-dashboard.item :loop="$loop">
                    <h2 class="mr-5 truncate w-36 font-medium">{{ $quote->getTranslation('name', app()->getLocale()) }}</h2>
                    <h2 class="mr-5 truncate font-medium">{{ $quote->movie->getTranslation('name', app()->getLocale()) }}</h2>
                    <div class="flex items-center">
                        <img
                            class="mr-5 rounded h-14 w-20"
                            src="{{ asset('storage/' . $quote->picture) }}"
                            alt="movie picture"
                        />
                        <a class="mr-5 text-indigo-600" href="/quotes/{{ $quote->id }}/edit">
                            {{ __('dashboard.edit') }}
                        </a>
                        <form action="/quotes/{{ $quote->id }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <x-dashboard.delete-button />
                        </form>
                    </div>
                </x-dashboard.item>
            @endforeach

            @else
                <p class="text-center text-gray-500">{{ __('hint.quotes_dont_exists') }}</p>
        @endif
    </x-dashboard.container>
</x-layout>
