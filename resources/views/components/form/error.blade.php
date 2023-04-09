@props(['name', 'error'])

@error($name)
    <p class="mt-1 text-red-500">{{ __($error) }}</p>
@enderror


