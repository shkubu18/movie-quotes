<x-layout>
    <x-move-back path="/" />

    <div class="min-h-screen flex justify-center">
        <div class="w-2/5">
            <h1 class="text-4xl my-10">{{ $movie->getTranslation('name', app()->getLocale()) }}</h1>
            @foreach($quotes as $quote)
                <div class="bg-white text-black rounded-xl mb-7">
                    <img
                        class="rounded-t-xl"
                        src="{{ asset('storage/' . $quote->picture) }}"
                        alt="movie picture"
                    />
                    <h1 class="p-5">{{ '"' . $quote->getTranslation('name', app()->getLocale()) . '"' }}</h1>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
