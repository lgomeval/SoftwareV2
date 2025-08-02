@props(['model', 'fields' => [], 'submitLabel' => 'Actualizar', 'submitAction' => ''])

<div class="w-full mx-auto p-6 bg-white dark:bg-zinc-900 rounded-lg shadow-lg space-y-6">
    <h2 class="text-2xl font-bold text-center text-zinc-800 dark:text-white">Editar {{ class_basename($model) }}</h2>
    <hr class="border-gray-300 dark:border-zinc-700">

    <form wire:submit.prevent="{{ $submitAction }}">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @foreach ($fields as $field)
                <x-input-field name="{{ $field['name'] }}" label="{{ $field['label'] }}"
                    model="{{ $field['model'] ?? $field['name'] }}" type="{{ $field['type'] ?? 'text' }}"
                    :readonly="$field['readonly'] ?? false" />
            @endforeach
        </div>

        <div class="mt-6 flex justify-between">
            <x-action-button type="submit" variant="warning" :label="$submitLabel" />
            <x-action-button :href="$backRoute ?? url()->previous()" variant="success" label="Regresar" />
        </div>
    </form>
</div>
