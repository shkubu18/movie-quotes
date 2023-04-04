<x-layout>
    <div class="min-h-screen flex items-center justify-center flex-col">
        <h1 class="mb-10 text-3xl">Add new movie</h1>
        <form class="w-1/5" action="/admin/movies" method="POST">
            @csrf

            <div class="flex flex-col">
                <label class="text-lg" for="name">Movie Name</label>
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
                <label class="text-lg" for="slug">Slug</label>
                <input
                    class="border border-gray-200 p-2 rounded"
                    type="text"
                    name="slug"
                    id="slug"
                    value="{{ old('slug') }}"
                    required
                />
            </div>
            <button
                class="bg-sky-500 p-2 rounded text-white mt-8 w-full"
                type="submit"
            >Create new movie
            </button>
        </form>
    </div>
</x-layout>