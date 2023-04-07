@props(['name', 'label'])

<x-form.field>
    <x-form.label name="{{ $name }}" title="{{ $label }}" />
    <input
        {{ $attributes(['class' => 'border border-gray-200 p-2 rounded text-black']) }}
        class="border border-gray-200 p-2 rounded text-black"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name) }}"
        {{ $attributes }}
    />
</x-form.field>

