<x-layout>
    <x-move-back path="/" />

    @if($movies->count())
        <x-container>
                <h1 class="mb-10 text-3xl text-center">{{ __('quote_form.heading') }}</h1>
                <form class="w-1/4" action="/quotes" method="POST" enctype="multipart/form-data">
                    @csrf

                    <x-form.input
                        name="name_en"
                        type="text"
                        label="quote_form.name_en"
                        hint="quote"
                        placeholder="{{ __('quote_form.name_en_placeholder') }}"
                    />
                    <x-form.input
                        name="name_ka"
                        type="text"
                        label="quote_form.name_ka"
                        hint="quote"
                        placeholder="{{ __('quote_form.name_ka_placeholder') }}"
                    />
                    <x-form.input
                        class="text-white"
                        name="movie_picture"
                        type="file"
                        label="quote_form.picture"
                        hint="quote"
                    />
                    <x-form.movie-dropdown :movies="$movies" hint="create_form" />

                    <x-form.button>{{ __('quote_form.button') }}</x-form.button>
                </form>
        </x-container>
        @else
        <div class="flex items-center flex-col">
            <p class="mt-16 text-amber-200">{{ __('quote_form.movies_dont_exists') }}</p>
            <a class="mt-10" href="/movies/create">{{ __('header.add_movie') }}</a>
        </div>
    @endif
</x-layout>
