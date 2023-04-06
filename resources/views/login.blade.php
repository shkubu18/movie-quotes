<x-layout>
    <div class="min-h-screen flex items-center justify-center flex-col">
        <h1 class="mb-10 text-3xl">{{ __('auth.signIn', [], session('language')) }}</h1>
        <form class="w-1/5" action="/login" method="POST">
            @csrf

            <div class="flex flex-col">
                <label class="text-lg" for="email">{{ __('auth.email', [], session('language')) }}</label>
                <input
                    class="border border-gray-200 p-2 rounded"
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    required
                />
            </div>

            <div class="flex flex-col mt-3">
                <label class="text-lg" for="password">{{ __('auth.password', [], session('language')) }}</label>
                <input
                    class="border border-gray-200 p-2 rounded"
                    type="password"
                    name="password"
                    id="password"
                    required
                />
            </div>

            <button
                class="bg-sky-500 p-2 rounded text-white mt-8 w-full"
                type="submit"
            >
                {{ __('auth.login', [], session('language')) }}
            </button>
        </form>
    </div>
</x-layout>

