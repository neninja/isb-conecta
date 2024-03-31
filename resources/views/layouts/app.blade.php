<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div>
            <!-- Page Content -->
            <div class="flex flex-col min-h-screen">
                <div class="bg-primary pt-14 pb-16 px-11" x-data="{showHeader: true}" @showing-responsive-menu="showHeader = !$event.detail.isShown">
                    <x-navigation-menu>
                        <header class="text-neutral-high">
                            <h1 class="text-xl font-semibold">{{ $title }}</h1>
                            <h2>{{ $subtitle }}</h2>
                        </header>
                    </x-navigation-menu>
                    <header x-show="showHeader" class="tracking-tight text-neutral-high mb-5">
                        <h1 class="text-3xl font-semibold">{{ $title }}</h1>
                        <h2>{{ $subtitle }}</h2>
                    </header>
                </div>
                <div class="-mt-[2rem] rounded-[8rem] bg-white py-8"></div>
                <div class="px-11 flex-grow flex justify-center"">
                    <div class="w-[50rem] flex flex-col">
                        <main>{{$slot}}</main>
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
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
