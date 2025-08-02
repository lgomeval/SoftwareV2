<flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-900">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

    <flux:navbar class="-mb-px max-lg:hidden">
        <flux:navbar.item icon="home" href="#" current>AdminPanel</flux:navbar.item>
        <flux:navbar.item icon="inbox" badge="12" href="#">Buzon de Correo</flux:navbar.item>
        <flux:navbar.item icon="calendar" href="#">Calendario</flux:navbar.item>
        <flux:separator vertical variant="subtle" class="my-2" />
        @role(['Dev', 'Admin'])
            <flux:dropdown class="max-lg:hidden">
                <flux:navbar.item icon:trailing="chevron-down">Favoritos</flux:navbar.item>
                <flux:navmenu>
                    <flux:navmenu.item href="#">Marketing site</flux:navmenu.item>
                    <flux:navmenu.item href="#">Android app</flux:navmenu.item>
                    <flux:navmenu.item href="#">Brand guidelines</flux:navmenu.item>
                </flux:navmenu>
            </flux:dropdown>

            {{-- Pacientes --}}
            <flux:navbar.item icon="user-group" href="{{ route('pacientes.index') }}" label="Pacientes"
                badge="{{ \App\Models\Paciente::count() }}" title="Gestion de pacientes Registrados">Pacientes
            </flux:navbar.item>

            {{-- Especialistas --}}
            <flux:navbar.item icon="user-group" href="{{ route('especialistas.index') }}" label="Especialistas"
                badge="{{ \App\Models\Especialista::count() }}" title="Gestion de especialistas Registrados">Especialistas
            </flux:navbar.item>

            {{-- usuarios --}}
            <flux:navbar.item icon="users" href="{{ route('usuarios.index') }}" label="Usuarios"
                badge="{{ \App\Models\User::count() }}" title="Gestion de Usuarios Registrados">Usuarios
            </flux:navbar.item>
        @endrole

    </flux:navbar>
    <flux:spacer />
    <flux:navbar class="me-4">
        <flux:navbar.item icon="magnifying-glass" href="#" label="Search" />
        <flux:navbar.item icon="information-circle" href="#" label="Help" />
    </flux:navbar>

    {{-- Modo Oscuro --}}
    <flux:navbar class="me-4" x-data="{ dark: localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) }" x-init="$watch('dark', val => {
        localStorage.theme = val ? 'dark' : 'light';
        document.documentElement.classList.toggle('dark', val)
    })">

        <button @click="dark = !dark" class="rounded-full p-2 hover:bg-zinc-200 dark:hover:bg-zinc-700 max-lg:hidden"
            :title="dark ? 'Cambiar a modo claro' : 'Cambiar a modo oscuro'">
            <!-- Icono Sol (modo claro) -->
            <svg x-show="!dark" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 3v1m0 16v1m8.66-13.66l-.71.71M4.05 19.95l-.71.71m16.97 0l-.71-.71M4.05 4.05l-.71-.71M21 12h1M2 12H1m11-9a9 9 0 110 18 9 9 0 010-18z" />
            </svg>

            <!-- Icono Luna (modo oscuro) -->
            <svg x-show="dark" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 3c.132 0 .263.003.394.01a9 9 0 107.596 7.596A7.5 7.5 0 0112 3z" />
            </svg>
        </button>
    </flux:navbar>

    <!-- Desktop User Menu -->
    <flux:dropdown position="top" align="end">
        <flux:profile class="cursor-pointer" :initials="auth()->user()->initials()" />
        <flux:menu>
            <flux:menu.radio.group>
                <div class="p-0 text-sm font-normal">
                    <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                        <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                            <span
                                class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                {{ auth()->user()->nombres[0] . auth()->user()->apellidos[0] }}
                            </span>
                        </span>

                        <div class="grid flex-1 text-start text-sm leading-tight">
                            <span
                                class="truncate font-semibold">{{ auth()->user()->nombres . ' ' . auth()->user()->apellidos }}</span>
                            <span class="truncate text-xs">{{ auth()->user()->cargo }}</span>
                        </div>
                    </div>
                </div>
            </flux:menu.radio.group>

            <flux:menu.separator />

            <flux:menu.radio.group>
                <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}
                </flux:menu.item>
            </flux:menu.radio.group>

            <flux:menu.separator />

            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                    {{ __('Log Out') }}
                </flux:menu.item>
            </form>
        </flux:menu>
    </flux:dropdown>
</flux:header>

<!-- Sidebar -->
<flux:sidebar stashable sticky
    class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />
</flux:sidebar>

<!-- Mobile User Menu -->
<flux:header class="lg:hidden">
    <flux:sidebar.toggle class="lg:hidden z-40" icon="bars-2" inset="left" />

    <flux:spacer />

    <flux:dropdown position="top" align="end">
        <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

        <flux:menu>
            <flux:menu.radio.group>
                <div class="p-0 text-sm font-normal">
                    <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                        <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                            <span
                                class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                {{ auth()->user()->initials() }}
                            </span>
                        </span>

                        <div class="grid flex-1 text-start text-sm leading-tight">
                            <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                            <span class="truncate text-xs">{{ auth()->user()->cargo }}</span>
                        </div>
                    </div>
                </div>
            </flux:menu.radio.group>

            <flux:menu.separator />

            <flux:menu.radio.group>
                <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}
                </flux:menu.item>
            </flux:menu.radio.group>

            <flux:menu.separator />

            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                    {{ __('Log Out') }}
                </flux:menu.item>
            </form>
        </flux:menu>
    </flux:dropdown>
</flux:header>
