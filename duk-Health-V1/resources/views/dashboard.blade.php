<x-layouts.app :title="__('Duk Health - Dashboard')">

    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
            {{ __('Dashboard') }}
        </h1>
    </x-slot>

    <x-slot name="content">
        <div class="mt-2">
            <p class="text-gray-700 dark:text-gray-300">
                {{ __('Welcome to the Duk Health Admin Panel!') }}
            </p>
        </div>
        <div class="mt-6">
            <p class="text-gray-700 dark:text-gray-300">
                {{ __('Aprendiendo Tailwind CSS 4') }}
            </p>
        </div>
    </x-slot>

</x-layouts.app>