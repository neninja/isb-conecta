<nav x-data="{ open: false }" @showing-responsive-menu="open = $event.detail.isShown">
    <!-- Primary Navigation Menu -->
    <div class="flex justify-between items-start mb-10">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:flex">
            <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                Página inicial
            </x-nav-link>
            <x-nav-link href="{{ route('reports.index') }}" :active="request()->routeIs('reports.*')">
                Relatórios
            </x-nav-link>
            <x-nav-link href="{{ route('settings.index') }}" :active="request()->routeIs('settings.*')">
                Configurações
            </x-nav-link>
        </div>

        <div class="hidden sm:flex sm:items-center sm:ms-6">
            <!-- Profile Dropdown -->
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button type="button">
                        <x-heroicon-c-user-circle class="w-5 fill-neutral-high" />
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link href="{{ route('profile.show') }}">
                        {{user()->name}}
                    </x-dropdown-link>

                    <div class="border-t border-gray-200"></div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-dropdown-link href="{{ route('logout') }}"
                                 @click.prevent="$root.submit();">
                            <span class="text-error">Sair</span>
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>

        <div x-show="open">
            <header class="text-neutral-high">
                <h1 class="text-xl font-semibold">{{user()->name}}</h1>
                <h2>{{user()->currentTeam->name}}</h2>
            </header>
        </div>

        <!-- Hamburger -->
        <div class="flex items-center sm:hidden ml-auto">
            <button @click="$dispatch('showing-responsive-menu', { isShown: !open })" class="inline-flex items-center justify-center rounded-md text-neutral-high focus:outline-none transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div x-show="open" x-transition>
        <div class="flex flex-col gap-2">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                <x-slot:icon>
                    <x-heroicon-o-home class="text-primary group-hover:text-neutral-low-dark" />
                </x-slot>
                Página inicial
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('reports.index') }}" :active="request()->routeIs('reports.*')">
                <x-slot:icon>
                    <x-heroicon-o-calendar-days class="text-primary group-hover:text-neutral-low-dark" />
                </x-slot>
                Relatórios
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('settings.index') }}" :active="request()->routeIs('settings.*')">
                <x-slot:icon>
                    <x-heroicon-o-cog-6-tooth class="text-primary group-hover:text-neutral-low-dark" />
                </x-slot>
                Configurações
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('profile.show') }}">
                <x-slot:icon>
                    <x-heroicon-o-user class="text-primary group-hover:text-neutral-low-dark" />
                </x-slot>
                Perfil
            </x-responsive-nav-link>
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <x-responsive-nav-link href="{{ route('logout') }}" class="!text-error group-hover:!text-neutral-low-dark"
                         @click.prevent="$root.submit();">
                    <x-slot:icon>
                        <x-heroicon-c-x-mark class="text-error group-hover:text-neutral-low-dark" />
                    </x-slot>
                    Sair
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>
