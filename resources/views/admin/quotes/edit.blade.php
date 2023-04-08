<x-layout>
    <x-move-back path="/admin/quotes/dashboard" />

    @if($movies->count())
        <x-container>
                <h1 class="mb-10 text-3xl text-center">{{ __('quote_form.edit_heading') }}</h1>
                <form class="w-1/4" action="/admin/quotes/{{ $quote->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <x-form.input
                        name="name_en"
                        type="text"
                        label="quote_form.quote_name_en"
                        hint="quote"
                        :value="old('name_en', $quote->getTranslation('name', 'en'))"
                    />
                    <x-form.input
                        name="name_ka"
                        type="text"
                        label="quote_form.quote_name_ka"
                        hint="quote"
                        :value="old('name_ka', $quote->getTranslation('name', 'ka'))"
                    />
                    <div class="mb-2">
                        <x-form.input
                            class="text-white"
                            name="movie_picture"
                            type="file"
                            label="quote_form.film"
                            hint="quote"
                            :value="old('movie_picture', $quote->movie_picture)"
                        />
                        <img
                            width="90"
                            class="rounded"
                            src="{{ asset('storage/' . $quote->movie_picture) }}"
                            alt="movie picture"
                        >
                    </div>
                    <x-form.movie-dropdown :movies="$movies" :quote="$quote" hint="edit_form"/>

                    <x-form.button>{{ __('quote_form.update_btn') }}</x-form.button>
                </form>
        </x-container>
    @else
        <div class="flex items-center flex-col">
            <p
                class="mt-10"
            >
                Unfortunately, movies don't exist at this point.
                You must add at least one movie to create a quote.
            </p>
            <a class="underline mt-5" href="/admin/movies/create">Add new movie</a>
        </div>
    @endif
</x-layout>
