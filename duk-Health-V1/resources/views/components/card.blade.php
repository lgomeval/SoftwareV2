<div
    class="bg-white dark:bg-zinc-800 rounded-2xl shadow border border-gray-200 dark:border-zinc-700 p-6 w-full max-w-4xl mx-auto">
    {{-- Header del Card --}}
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold text-zinc-800 dark:text-zinc-100 "> {{ $titleCard ?? '' }}</h2>
        <!-- Podrías poner aquí botones adicionales -->
    </div>

    {{-- Contenido del Card --}}
    <div class="space-y-4">
        {{ $bodyCard }}
    </div>
</div>
