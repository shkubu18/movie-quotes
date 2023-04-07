<x-layout>
    <a class="absolute m-5 underline text-lg" href="/">{{ __('hint.back') }}</a>

    <div class="flex justify-center items-center min-h-screen">
        <div class="flex flex-col items-center rounded-xl mx-16 w-[700px] bg-slate-200 p-7">
            <h1 class="text-3xl text-indigo-600 mb-10">{{ __('dashboard.quotes_dashboard') }}</h1>
            @foreach($quotes as $quote)
                <div
                    class="flex items-center justify-between overflow-auto border-2 border-gray-300 text-gray-700
                    rounded-xl p-3 w-full hover:bg-slate-50 duration-500 {{ !$loop->first ? ' mt-3' : '' }}"
                >
                    <h2 class="mr-5 font-medium">{{ $quote->getTranslation('name', app()->getLocale()) }}</h2>
                    <div class="flex items-center">
                        <img
                            class="mr-5 rounded h-[60px] w-[90px]"
                            src="{{ asset('storage/' . $quote->movie_picture) }}"
                            alt="movie picture"
                        />
                        <a
                            class="mr-5 text-indigo-600"
                            href="/admin/quotes/{{ $quote->id }}/edit"
                        >
                            {{ __('dashboard.edit') }}
                        </a>
                        <form action="/admin/quotes/{{ $quote->id }}" method="POST">
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
