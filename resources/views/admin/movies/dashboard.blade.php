<x-layout>
    <div class="flex justify-center items-center min-h-screen">
        <div class="flex flex-col items-center rounded p-10 w-2/5">
            @foreach($movies as $movie)
                <div class="flex bg-slate-200 rounded p-4 w-full {{ !$loop->first ? ' mt-3' : '' }}">
                    <a
                        class="mr-5"
                        href="/movies/{{ $movie->slug }}"
                    >
                        {{ $movie->getTranslation('name', session('language')) }}
                    </a>
                    <a
                        class="mr-5"
                        href="/admin/movies/{{ $movie->id }}/edit"
                    >
                        {{ __('dashboard.edit', [], session('language')) }}
                    </a>
                    <form action="/admin/movies/{{ $movie->id }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button>{{ __('dashboard.delete', [], session('language')) }}</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
