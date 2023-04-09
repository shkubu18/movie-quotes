<x-layout>
    <x-move-back path="/" />

    <x-container>
            <h1 class="mb-10 text-3xl text-center">{{ __('movie_form.heading') }}</h1>
            <form class="w-1/4" action="/admin/movies" method="POST">
                @csrf

                <x-form.input
                    name="name_en"
                    type="text"
                    label="movie_form.name_en"
                    hint="movie"
                    placeholder="{{ __('movie_form.name_en_placeholder') }}"
                />
                <x-form.input
                    name="name_ka"
                    type="text"
                    label="movie_form.name_ka"
                    hint="movie"
                    placeholder="{{ __('movie_form.name_ka_placeholder') }}"
                />
                <x-form.input
                    name="slug"
                    type="text"
                    label="movie_form.slug"
                    hint="movie"
                    placeholder="{{ __('movie_form.slug_placeholder') }}"
                />

                <x-form.button>{{ __('movie_form.button') }}</x-form.button>
            </form>
    </x-container>
</x-layout>
