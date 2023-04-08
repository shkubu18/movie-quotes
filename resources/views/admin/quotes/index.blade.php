<x-layout>
    <x-move-back path="/" />

    <x-dashboard.container>
        <x-dashboard.title>{{ __('dashboard.quotes_dashboard') }}</x-dashboard.title>

        @if($quotes->count())
            <x-dashboard.quantity>{{ __('hint.quotes_qty') . ": " . $quotes->count()  }}</x-dashboard.quantity>

            @foreach($quotes as $quote)
                <x-dashboard.item :loop="$loop">
                    <h2 class="mr-5 font-medium">{{ $quote->getTranslation('name', app()->getLocale()) }}</h2>
                    <div class="flex items-center">
                        <img
                            class="mr-5 rounded h-[60px] w-[90px]"
                            src="{{ asset('storage/' . $quote->movie_picture) }}"
                            alt="movie picture"
                        />
                        <a class="mr-5 text-indigo-600" href="/admin/quotes/{{ $quote->id }}/edit">
                            {{ __('dashboard.edit') }}
                        </a>
                        <form action="/admin/quotes/{{ $quote->id }}" method="POST">
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
