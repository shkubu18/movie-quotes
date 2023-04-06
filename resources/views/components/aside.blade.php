<aside class="absolute flex min-h-screen justify-center flex-col pl-4">
    <a
        href="{{ route('language.set', ['lang' => 'en']) }}"
        class="mb-3 border-solid border-2 border-white rounded-full p-2 text-xs
            {{ app()->getLocale() === 'en' ? "bg-white text-black" : "" }}"
    >EN
    </a>
    <a
        href="{{ route('language.set', ['lang' => 'ka']) }}"
        class="mt-3 border-solid border-2 border-white rounded-full p-2 text-xs
            {{ app()->getLocale() === 'ka' ? "bg-white text-black" : "" }}"
    >KA
    </a>
</aside>
