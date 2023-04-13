<x-layout>
    <x-move-back path="{{ route('quotes.index') }}" />

    @if($movies->count())
        <x-container>
            <h1 class="mb-10 text-3xl text-center">{{ __('quote_form.edit_heading') }}</h1>

            <form class="w-1/4" action="/quotes/{{ $quote->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-form.input
                    name="name_en"
                    type="text"
                    label="quote_form.name_en"
                    hint="quote"
                    placeholder="{{ __('quote_form.name_en_placeholder') }}"
                    :value="old('name_en', $quote->getTranslation('name', 'en'))"
                />
                <x-form.input
                    name="name_ka"
                    type="text"
                    label="quote_form.name_ka"
                    hint="quote"
                    placeholder="{{ __('quote_form.name_ka_placeholder') }}"
                    :value="old('name_ka', $quote->getTranslation('name', 'ka'))"
                />
                <div class="mb-2">
                    <x-form.input
                        class="text-white"
                        name="picture"
                        type="file"
                        label="quote_form.film"
                        hint="quote"
                        :value="old('picture', $quote->picture)"
                    />
                    <img
                        width="90"
                        class="rounded"
                        src="{{ asset('storage/' . $quote->picture) }}"
                        alt="movie picture"
                    >
                </div>
                <x-form.movie-dropdown :movies="$movies" :quote="$quote" hint="edit_form"/>

                <x-form.button>{{ __('quote_form.update_btn') }}</x-form.button>
            </form>
        </x-container>
    @else
        <div class="flex items-center flex-col">
            <p class="mt-16 text-amber-200">{{ __('quote_form.movies_dont_exists') }}</p>
            <a class="mt-10" href="{{ route('movies.create') }}">{{ __('header.add_movie') }}</a>
        </div>
    @endif
</x-layout>
