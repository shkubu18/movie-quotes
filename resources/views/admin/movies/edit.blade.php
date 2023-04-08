<x-layout>
    <x-move-back path="/admin/movies/dashboard" />

    <x-container>
        <h1 class="mb-10 text-3xl text-center">{{ __('movie_form.edit_heading') }}</h1>
        <form class="w-1/4" action="/admin/movies/{{ $movie->id }}" method="POST">
            @csrf
            @method('PATCH')

            <x-form.input
                name="name_en"
                type="text"
                label="movie_form.movie_name_en"
                hint="movie"
                :value="old('name_en', $movie->getTranslation('name', 'en'))"
            />
            <x-form.input
                name="name_ka"
                type="text"
                hint="movie"
                label="movie_form.movie_name_ka"
                :value="old('name_ka', $movie->getTranslation('name', 'ka'))"
            />
            <x-form.input
                name="slug"
                type="text"
                hint="movie"
                label="movie_form.slug"
                :value="old('slug', $movie->slug)"
            />

            <x-form.button>{{ __('movie_form.update_btn') }}</x-form.button>
        </form>
    </x-container>
</x-layout>
