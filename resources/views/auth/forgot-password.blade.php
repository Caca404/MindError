<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="/">
                <h1 style="font-size: 4em; color:white;font-family: sans-serif; font-weight: 600;">ErrorMind</h1>
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Esqueceu da sua senha? Sem problemas. Só nos deixe saber do seu endereço de email e nós iremos enviar ao seu email o link para refazer a senha.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Enviar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
