<x-layout>
    @if($movies->count())
        <div class="min-h-screen flex items-center justify-center flex-col">
            <h1 class="mb-10 text-3xl">{{ __('quote_form.heading', [], session('language')) }}</h1>
            <form class="w-1/5" action="/admin/quotes" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="flex flex-col">
                    <label class="text-lg" for="name_en">{{ __('quote_form.quote_name_en', [], session('language'))  }}</label>
                    <input
                        class="border border-gray-200 p-2 rounded"
                        type="text"
                        name="name_en"
                        id="name_en"
                        value="{{ old('name_en') }}"
                        required
                    />
                </div>
                <div class="flex flex-col">
                    <label class="text-lg" for="name_ka">{{ __('quote_form.quote_name_ka', [], session('language'))  }}</label>
                    <input
                        class="border border-gray-200 p-2 rounded"
                        type="text"
                        name="name_ka"
                        id="name_ka"
                        value="{{ old('name_ka') }}"
                        required
                    />
                </div>
                <div class="flex flex-col mt-3">
                    <label class="text-lg" for="movie_picture">{{ __('quote_form.film', [], session('language'))  }}</label>
                    <input
                        class="border border-gray-200 p-2 rounded"
                        type="file"
                        name="movie_picture"
                        id="movie_picture"
                        required
                    />

                </div>

                <div class="flex flex-col mt-3">
                    <label class="text-lg" for="movie">{{ __('quote_form.select_movie', [], session('language'))  }}</label>
                    <select
                        class="p-1.5 rounded-md bg-gray-100"
                        name="movie_id"
                        id="movie"
                    >
                        @foreach($movies as $movie)
                            <option
                                value="{{ $movie->id }}"
                                {{ old('movie_id') === $movie->id ? 'selected' : '' }}
                            >
                                {{ ucwords($movie->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button
                    class="bg-sky-500 p-2 rounded text-white mt-8 w-full"
                    type="submit"
                >{{ __('quote_form.button', [], session('language'))  }}
                </button>
            </form>
        </div>
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
