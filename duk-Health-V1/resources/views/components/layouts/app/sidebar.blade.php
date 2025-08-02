<flux:sidebar sticky stashable class="z-40 border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">

    <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
        <x-app-logo />
    </a>

    <flux:separator />

    {{-- Agendamiento --}}
    <flux:navlist class="w-64" variant="outline">
        <flux:navlist.group heading="Agendamiento" icon="calendar" expandable :expanded="false">
            <flux:navlist.item href="#" icon="calendar">Consultar Agenda</flux:navlist.item>
            <flux:navlist.item href="#" icon="clock">Confirmar Cita</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>

    {{-- Nueva Venta --}}
    <flux:navlist class="w-64" variant="outline">
        <flux:navlist.group heading="Nueva Venta o Servicio" expandable :expanded="false">
            <flux:navlist.item href="#" icon="credit-card">Crear Venta</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>

    {{-- Seguimiento a pendientes --}}
    <flux:navlist class="w-64" variant="outline">
        <flux:navlist.group heading="Seguimiento a Pendientes" icon="clipboard-list" expandable :expanded="false">
            <flux:navlist.item href="#" icon="x-mark">Inasistencia & Cancelaciones</flux:navlist.item>
            <flux:navlist.item href="#" icon="lock-open">Conceptos Abiertos</flux:navlist.item>
            <flux:navlist.item href="#" icon="lock-open">Conceptos Aplazados</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>

    {{-- Concepto Medico --}}
    <flux:navlist class="w-64" variant="outline">
        <flux:navlist.group heading="Concepto Médico" icon="clipboard-list" expandable :expanded="false">
            <flux:navlist.item href="#" icon="magnifying-glass-circle">Consultar</flux:navlist.item>
            <flux:navlist.item href="#" icon="pencil-square">Notas médicas</flux:navlist.item>
            <flux:navlist.item href="#" icon="presentation-chart-line">Calificación x PCL</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>

    {{-- Orden de Servicio --}}
    <flux:navlist class="w-64" variant="outline">
        <flux:navlist.group heading="Orden de Servicio" icon="clipboard-list" expandable :expanded="false">
            <flux:navlist.item href="#" icon="magnifying-glass-circle">Consultar</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>

    {{-- Envios & Entregaso --}}
    <flux:navlist class="w-64" variant="outline">
        <flux:navlist.group heading="Envios & Entregas" icon="clipboard-list" expandable :expanded="false">
            <flux:navlist.item href="#" icon="magnifying-glass-circle">Entrega de Certificados</flux:navlist.item>
            <flux:navlist.item href="#" icon="pencil-square">Historial de Envios
            </flux:navlist.item>
            <flux:navlist.item href="#" icon="presentation-chart-line">Formulario</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>

    {{-- Clientes --}}
    <flux:navlist class="w-64" variant="outline">
        <flux:navlist.group heading="Clientes" icon="clipboard-list" expandable :expanded="false">
            <flux:navlist.item href="#" icon="magnifying-glass-circle">Consultar</flux:navlist.item>
            <flux:navlist.item href="#" icon="pencil-square">Certificaciones</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>

    {{-- Ventas --}}
    <flux:navlist class="w-64" variant="outline">
        <flux:navlist.group heading="Ventas" icon="clipboard-list" expandable :expanded="false">
            <flux:navlist.item href="#" icon="magnifying-glass-circle">Tarifarios</flux:navlist.item>
            <flux:navlist.item href="#" icon="pencil-square">Procesos de Ventas</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>

    {{-- Informes & Reportes --}}
    <flux:navlist class="w-64" variant="outline">
        <flux:navlist.group heading="Informes & Reportes" icon="clipboard-list" expandable :expanded="false">
            <flux:navlist.item href="#" icon="magnifying-glass-circle">Clientes</flux:navlist.item>
            <flux:navlist.item href="#" icon="pencil-square">Administrativos</flux:navlist.item>
            <flux:navlist.item href="#" icon="presentation-chart-line">Ventas</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>

    {{-- Formatos --}}
    <flux:navlist class="w-64" variant="outline">
        <flux:navlist.group heading="Formatos" icon="clipboard-list" expandable :expanded="false">
            <flux:navlist.item href="#" icon="magnifying-glass-circle">Descargas</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>

    {{-- Auditoria --}}
    <flux:navlist class="w-64" variant="outline">
        <flux:navlist.group heading="Auditoria" icon="clipboard-list" expandable :expanded="false">
            <flux:navlist.item href="#" icon="magnifying-glass-circle">Ordenes de Servicio</flux:navlist.item>
            <flux:navlist.item href="#" icon="pencil-square">Ventas</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>

    {{-- SEGURIDAD & SALUD EN EL TRABAJO--}}
    <flux:navlist class="w-64" variant="outline">
        <flux:navlist.group heading="Seguridad & Salud T" icon="clipboard-list" expandable
            :expanded="false">
            <flux:navlist.item href="#" icon="magnifying-glass-circle">Consultar</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>


    {{-- Repositorio & Documentacion --}}

    <flux:spacer />

    <flux:navlist variant="outline">
        <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
            {{ __('Repository') }}
        </flux:navlist.item>

        <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
            {{ __('Documentation') }}
        </flux:navlist.item>
    </flux:navlist>

</flux:sidebar>