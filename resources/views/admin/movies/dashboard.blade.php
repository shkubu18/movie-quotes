<x-layout>
    <div class="flex justify-center items-center min-h-screen">
        <div class="flex flex-col items-center rounded p-10">
            @foreach($movies as $movie)
                <div class="flex bg-slate-200 rounded p-4 w-80 {{ !$loop->first ? ' mt-3' : '' }}">
                    <a class="mr-5" href="/movies/{{ $movie->slug }}">{{ $movie->name }}</a>
                    <a class="mr-5" href="/admin/movies/{{ $movie->id }}/edit">Edit</a>
                    <form action="/admin/movies/{{ $movie->id }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="text-xs text-gray-400">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
