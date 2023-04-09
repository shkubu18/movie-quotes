@props(['loop'])

<div
    class="flex justify-between items-center border-2 border-gray-300 text-gray-700 rounded-xl
           p-3 w-full hover:bg-slate-50 duration-500 {{ !$loop->first ? ' mt-3' : '' }}"
>
    {{ $slot }}
</div>
