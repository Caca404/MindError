<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="/">
                <h1 style="font-size: 4em; color:white;font-family: sans-serif; font-weight: 600;">ErrorMind</h1>
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Senha') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm font-semibold text-gray-700">{{ __('Lembrar de mim') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                <div class="flex flex-col">

                    @if (Route::has('password.request'))
                        <a class="underline text-base text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Esqueceu a senha?') }}
                        </a>
                    @endif

                    <a class="underline text-base text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('Não tem conta?') }}
                    </a>

                </div>

                <x-jet-button class="ml-3">
                    {{ __('Entrar') }}
                </x-jet-button>
                
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
