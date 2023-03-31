<x-layout>
    <div class="min-h-screen flex items-center justify-center flex-col">
        <h1>{{ $movie->name }}</h1>
        @foreach($quotes as $quote)
            {{-- Test image --}}
            <img src="https://server5.intermedia.ge/article_images/small/201905/2019051700011137332.jpg"
                 alt="movie picture"
            />
            <h1>{{ $quote->name }}</h1>
        @endforeach
    </div>
</x-layout>
