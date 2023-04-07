<x-layout>
    <a class="absolute m-5 underline text-lg" href="/admin/movies/dashboard">{{ __('hint.back') }}</a>

    <x-container>
        <h1 class="mb-10 text-3xl text-center">{{ __('movie_form.edit_heading') }}</h1>
        <form class="w-1/5" action="/admin/movies/{{ $movie->id }}" method="POST">
            @csrf
            @method('PATCH')

            <x-form.input
                name="name_en"
                type="text"
                label="movie_form.movie_name_en"
                :value="old('name_en', $movie->getTranslation('name', 'en'))"
            />
            <x-form.input
                name="name_ka"
                type="text"
                label="movie_form.movie_name_ka"
                :value="old('name_ka', $movie->getTranslation('name', 'ka'))"
            />
            <x-form.input
                name="slug"
                type="text"
                label="movie_form.slug"
                :value="old('slug', $movie->slug)"
            />

            <x-form.button>{{ __('movie_form.update_btn') }}</x-form.button>
        </form>
    </x-container>
</x-layout>
