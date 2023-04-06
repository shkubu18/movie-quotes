<x-layout>
    <div class="flex justify-center items-center min-h-screen">
        <div class="flex flex-col items-center rounded p-10 w-2/5">
            @foreach($quotes as $quote)
                <div class="flex items-center justify-between bg-slate-200 rounded p-4 w-full {{ !$loop->first ? ' mt-3' : '' }}">
                    <h2 class="mr-5">{{ $quote->getTranslation('name', session('language')) }}</h2>
                    <div class="flex items-center">
                        <img
                            width="100"
                            class="mr-5 rounded"
                            src="{{ asset('storage/' . $quote->movie_picture) }}"
                            alt="movie picture"
                        />
                        <a
                            class="mr-5"
                            href="/admin/quotes/{{ $quote->id }}/edit"
                        >
                            {{ __('dashboard.edit', [], session('language')) }}
                        </a>
                        <form action="/admin/quotes/{{ $quote->id }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button>{{ __('dashboard.delete', [], session('language')) }}</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
