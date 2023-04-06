<x-layout>
    <a class="absolute m-5 underline text-lg" href="/">{{ __('hint.back') }}</a>
    @if($movies->count())
        <div class="min-h-screen flex items-center justify-center flex-col">
            <div class="w-1/4 flex flex-col">
                <h1 class="mb-10 text-3xl text-center">{{ __('quote_form.edit_heading') }}</h1>
                <form action="/admin/quotes/{{ $quote->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="flex flex-col">
                        <label class="text-lg" for="name_en">{{ __('quote_form.quote_name_en') }}</label>
                        <input
                            class="border border-gray-200 p-2 rounded text-black"
                            type="text"
                            name="name_en"
                            id="name_en"
                            value="{{ old('name_en', $quote->getTranslation('name', 'en')) }}"
                            required
                        />
                    </div>
                    <div class="flex flex-col mt-3">
                        <label class="text-lg" for="name_ka">{{ __('quote_form.quote_name_ka') }}</label>
                        <input
                            class="border border-gray-200 p-2 rounded text-black"
                            type="text"
                            name="name_ka"
                            id="name_ka"
                            value="{{ old('name_ka', $quote->getTranslation('name', 'ka')) }}"
                            required
                        />
                    </div>
                    <div class="flex flex-col mt-3">
                        <label class="text-lg" for="movie_picture">{{ __('quote_form.film') }}</label>
                        <input
                            class="border border-gray-200 p-2 rounded"
                            type="file"
                            name="movie_picture"
                            id="movie_picture"
                            value="{{ old('movie_picture', $quote->movie_picture) }}"
                        />
                        <img
                            width="90"
                            class="rounded mt-2"
                            src="{{ asset('storage/' . $quote->movie_picture) }}"
                            alt="movie picture"
                        >
                    </div>

                    <div class="flex flex-col mt-3">
                        <label class="text-lg" for="movie">{{ __('quote_form.select_movie')  }}</label>
                        <select
                            class="py-2.5 px-2 rounded-md bg-gray-100 text-black"
                            name="movie_id"
                            id="movie"
                        >
                            @foreach($movies as $movie)
                                <option
                                    value="{{ $movie->id }}"
                                    {{ old('movie_id', $quote->movie_id) === $movie->id ? 'selected' : '' }}
                                >
                                    {{ ucwords($movie->getTranslation('name', app()->getLocale())) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button
                        class="bg-sky-500 p-2 rounded text-white mt-8 w-full"
                        type="submit"
                    >{{ __('quote_form.button')  }}
                    </button>
                </form>
            </div>
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
