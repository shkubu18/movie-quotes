<x-layout>
    <div class="min-h-screen flex items-center justify-center flex-col">
        <h1 class="mb-10 text-3xl">{{ __('movie_form.heading') }}</h1>
        <form class="w-1/5" action="/admin/movies" method="POST">
            @csrf

            <div class="flex flex-col">
                <label class="text-lg" for="name_en">{{ __('movie_form.movie_name_en') }}</label>
                <input
                    class="border border-gray-200 p-2 rounded"
                    type="text"
                    name="name_en"
                    id="name_en"
                    value="{{ old('name_en') }}"
                    required
                />
            </div>
            <div class="flex flex-col mt-3">
                <label class="text-lg" for="name_ka">{{ __('movie_form.movie_name_ka') }}</label>
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
                <label class="text-lg" for="slug">{{ __('movie_form.slug') }}</label>
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
            >{{ __('movie_form.button') }}
            </button>
        </form>
    </div>
</x-layout>
