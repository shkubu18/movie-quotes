<x-layout>
    @if($movies->count())
        <div class="min-h-screen flex items-center justify-center flex-col">
            <h1 class="mb-10 text-3xl">Add new quote</h1>
            <form class="w-1/5" action="/admin/quotes/{{ $quote->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="flex flex-col">
                    <label class="text-lg" for="name">Quote Name</label>
                    <input
                        class="border border-gray-200 p-2 rounded"
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name', $quote->name) }}"
                        required
                    />
                </div>
                <div class="flex flex-col mt-3">
                    <label class="text-lg" for="movie_picture">Choose a frame of the film</label>
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
                    <label class="text-lg" for="movie">Please select movie</label>
                    <select
                        class="p-1.5 rounded-md bg-gray-100"
                        name="movie_id"
                        id="movie"
                    >
                        @foreach($movies as $movie)
                            <option
                                value="{{ $movie->id }}"
                                {{ old('movie_id', $quote->movie_id) === $movie->id ? 'selected' : '' }}
                            >
                                {{ ucwords($movie->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button
                    class="bg-sky-500 p-2 rounded text-white mt-8 w-full"
                    type="submit"
                >Update
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
