<x-login-layout>
    <x-slot name="header">
        <h1>
            Bem-vindo ao <strong class="font-extrabold">ISB <span class="uppercase">Conecta</span></strong>
        </h1>
    </x-slot>
    <div>
        <p>
            Para realizar seu login basta entrar com o nome de usuário e a senha pré-definida que foi repassada para você. Caso não a tenha entre em contato com seu supervisor.
        </p>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mt-5">
                <x-input label="Digite seu email" type="email" name="email" required autofocus autocomplete="username" is-outlined />
            </div>
            <div class="mt-5">
                <x-input label="Digite sua senha" type="password" name="password" required autocomplete="current-password" is-outlined />
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        Esqueceu sua senha?
                    </a>
                @endif
            </div>

            <x-button full>
                Prosseguir
            </x-button>
        </form>
    </div>
</x-login-layout>
