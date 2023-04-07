@props(['movies', 'quote', 'hint'])

<x-form.field>
    <x-form.label name="movie" title="quote_form.select_movie" />
    <select
        class="py-2.5 px-2 rounded bg-gray-100 text-black"
        name="movie_id"
        id="movie"
    >
        @foreach($movies as $movie)
            <option
                value="{{ $movie->id }}"
                @if($hint === 'edit_form')
                    {{ old('movie_id', $quote->movie_id) == $movie->id ? 'selected' : '' }}
                    @else
                    {{ old('movie_id') == $movie->id ? 'selected' : '' }}
                @endif
            >
                {{ ucwords($movie->getTranslation('name', app()->getLocale())) }}
            </option>
        @endforeach
    </select>
</x-form.field>
