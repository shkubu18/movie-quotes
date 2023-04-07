<x-layout>
    <a class="absolute m-5 underline text-lg" href="/">{{ __('hint.back') }}</a>
    <x-container>
            <h1 class="mb-10 text-3xl text-center">{{ __('movie_form.heading') }}</h1>
            <form class="w-1/4" action="/admin/movies" method="POST">
                @csrf

                <x-form.input name="name_en" type="text" label="movie_form.movie_name_en" />
                <x-form.input name="name_ka" type="text" label="movie_form.movie_name_ka" />
                <x-form.input name="slug" type="text" label="movie_form.slug" />

                <x-form.button>{{ __('movie_form.button') }}</x-form.button>
            </form>
    </x-container>
</x-layout>
