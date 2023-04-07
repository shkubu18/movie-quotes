<x-layout>
    <x-container>
            <h1 class="mb-10 text-3xl text-center">{{ __('auth.signIn') }}</h1>
            <form class="w-1/4" action="/login" method="POST">
                @csrf

                <x-form.input name="email" type="email" label="auth.email" />
                <x-form.input name="password" type="password" label="auth.password" />

                <x-form.button>{{ __('auth.login') }}</x-form.button>
            </form>
    </x-container>
</x-layout>

