<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />TICKETING SUPPORT
            </a>
        </x-slot>
{{-- {{$errors}} --}}
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Tipo de Usuario -->
            <div>
                <select class="form-select" aria-label="Default select example" name="tipo">
                    <option selected>Open this select menu for choise your type user</option>
                    <option type="text" value="0">Cliente</option>
                    <option type="text" value="1">Atendente</option>
                </select>
            </div>

            <!-- Codigo -->
            <div>
                <x-label for="codigo" :value="__('Codigo')" />
                <x-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo')"
                    required />
            </div>

            <!-- Nome -->
            <div>
                <x-label for="nome" :value="__('Nome')" />
                <x-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')"
                    required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- Telefone -->
            <div>
                <x-label for="telefone" :value="__('Telefone')" />
                <x-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" :value="old('telefone')"
                    required />
            </div>

            <!-- Login -->
            <div>
                <x-label for="login" :value="__('Login')" />
                <x-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')"
                    required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
