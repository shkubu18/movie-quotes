<x-layout>
    <a class="absolute m-5 underline text-lg" href="/">{{ __('hint.back') }}</a>
    @if($movies->count())
        <x-container>
                <h1 class="mb-10 text-3xl text-center">{{ __('quote_form.heading') }}</h1>
                <form class="w-1/4" action="/admin/quotes" method="POST" enctype="multipart/form-data">
                    @csrf

                    <x-form.input name="name_en" type="text" label="quote_form.quote_name_en" hint="quote" />
                    <x-form.input name="name_ka" type="text" label="quote_form.quote_name_ka" hint="quote" />
                    <x-form.input class="text-white" name="movie_picture" type="file" label="quote_form.film" hint="quote" />
                    <x-form.movie-dropdown :movies="$movies" hint="create_form" />

                    <x-form.button>{{ __('quote_form.button') }}</x-form.button>
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
