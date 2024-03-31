<x-guest-layout>
    <div class="flex flex-col min-h-screen">
        <div class="bg-primary pb-16"></div>
        <div class="-mt-[2rem] rounded-[8rem] bg-white py-8"></div>
        <div class="px-11 flex-grow flex justify-center" x-data="{step: 'intro'}">
            <div class="w-[50rem] flex flex-col">
                <header>
                    <h1 x-show="step == 'intro'" class="text-3xl font-semibold tracking-tight text-primary mb-5">
                        Bem-vindo ao <strong class="font-extrabold">ISB <span class="uppercase">Conecta</span></strong>
                    </h1>
                    <h1 x-show="step == 'credentials'" class="text-2xl font-semibold tracking-tight text-primary mb-1">
                        Realize seu login
                    </h1>
                </header>
                <main>
                    <x-button full x-show="step == 'intro'" @click="step = 'credentials'">
                        Prosseguir para login
                    </x-button>

                    <div x-show="step == 'credentials'">
                        <p>
                            Para realizar seu login basta entrar com o nome de usuário e a senha pré-definida que foi repassada para você. Caso não a tenha entre em contato com seu supervisor.
                        </p>
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
                </main>
                <footer class="mx-auto flex-auto flex flex-col justify-end mt-32 mb-16 w-full max-w-container px-4 sm:px-6 lg:px-8">
                    <ul class="flex justify-around">
                        <li>
                            <a href="#" class="text-neutral-low-medium hover:underline">Sobre</a>
                        </li>
                        <li>
                            <a href="#" class="text-neutral-low-medium hover:underline">Privacidade</a>
                        </li>
                        <li>
                            <a href="#" class="text-neutral-low-medium hover:underline">Termos</a>
                        </li>
                    </ul>
                </footer>
            </div>
        </div>
    </div>
</x-guest-layout>
