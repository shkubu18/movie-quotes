@props(['name', 'label', 'hint'])

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

    <x-form.error name="{{ $name }}" error="validation.{{ $hint }}_{{ $name }}" />
</x-form.field>

