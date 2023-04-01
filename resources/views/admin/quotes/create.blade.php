<x-layout>
    <div class="min-h-screen flex items-center justify-center flex-col">
        <h1 class="mb-10 text-3xl">Add new quote</h1>
        <form class="w-1/5" action="/admin/quotes" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="flex flex-col">
                <label class="text-lg" for="name">Quote Name</label>
                <input
                    class="border border-gray-200 p-2 rounded"
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
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
                    required
                />
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
            >Create new quote
            </button>
        </form>
    </div>
</x-layout>
