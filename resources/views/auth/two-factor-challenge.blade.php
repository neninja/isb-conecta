<x-login-layout>
    <x-slot name="header">
        <h1>
            Teste de <strong class="font-bold">TOTP</strong>
        </h1>
    </x-slot>
    <div x-data="{ recovery: false }">
        <p x-show="! recovery">
            Informe o código gerado pelo aplicativo
        </p>

        <p x-show="recovery">
            Informe as palavras de segurança
        </p>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('two-factor.login') }}">
            @csrf

            <div class="mt-4" x-show="! recovery">
                <x-input label="Código seguro" name="code" type="text" inputmode="numeric" autofocus autocomplete="one-time-code" is-outlined />
            </div>

            <div class="mt-4" x-cloak x-show="recovery">
                <x-input label="Palavras de recuperação" name="recovery_code" type="text" inputmode="numeric" autofocus autocomplete="one-time-code" is-outlined />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                x-show="! recovery"
                                x-on:click="
                                    recovery = true;
                                    $nextTick(() => { $refs.recovery_code.focus() })
                                ">
                    {{ __('Use a recovery code') }}
                </button>

                <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                x-cloak
                                x-show="recovery"
                                x-on:click="
                                    recovery = false;
                                    $nextTick(() => { $refs.code.focus() })
                                ">
                    {{ __('Use an authentication code') }}
                </button>

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </div>
</x-login-layout>
