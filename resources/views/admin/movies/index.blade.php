<x-layout>
    <a class="absolute m-5 underline text-lg" href="/">{{ __('hint.back') }}</a>

    <div class="flex justify-center items-center min-h-screen">
        <div class="flex flex-col items-center rounded-xl mx-16 md:w-[700px] bg-slate-200 p-7">
            <h1 class="text-3xl text-indigo-600 mb-10 text-center">{{ __('dashboard.movies_dashboard') }}</h1>
            @foreach($movies as $movie)
                <div
                    class="flex justify-between items-center border-2 border-gray-300 text-gray-700
                    rounded-xl p-5 w-full hover:bg-slate-50 duration-500 {{ !$loop->first ? ' mt-3' : '' }}"
                >
                    <a
                        class="mr-5 font-medium"
                        href="/movies/{{ $movie->slug }}"
                    >
                        {{ $movie->getTranslation('name', app()->getLocale()) }}
                    </a>
                    <div class="flex">
                        <a class="mr-5 text-indigo-600" href="/admin/movies/{{ $movie->id }}/edit">{{ __('dashboard.edit') }}</a>
                        <form action="/admin/movies/{{ $movie->id }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="text-gray-400">{{ __('dashboard.delete') }}</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
