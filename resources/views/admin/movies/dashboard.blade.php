<x-layout>
    <a class="absolute m-5 underline text-lg" href="/">{{ __('hint.back') }}</a>
    <div class="flex justify-center items-center min-h-screen">
        <div class="flex flex-col items-center rounded-3xl mx-16 min-w-[700px] bg-slate-600 p-7">
            <h1 class="text-3xl mb-10">{{ __('dashboard.movies_dashboard') }}</h1>
            @foreach($movies as $movie)
                <div
                    class="flex justify-between items-center overflow-auto bg-slate-400
                    rounded p-5 w-full {{ !$loop->first ? ' mt-3' : '' }}"
                >
                    <a
                        class="mr-5"
                        href="/movies/{{ $movie->slug }}"
                    >
                        {{ $movie->getTranslation('name', app()->getLocale()) }}
                    </a>
                    <div class="flex">
                        <a class="mr-5 text-indigo-600" href="/admin/movies/{{ $movie->id }}/edit">{{ __('dashboard.edit') }}</a>
                        <form action="/admin/movies/{{ $movie->id }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="text-red-600">{{ __('dashboard.delete') }}</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
