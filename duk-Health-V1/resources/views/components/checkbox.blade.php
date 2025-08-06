@props(['label', 'name', 'model', 'options'])

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
        {{ $label }}
    </label>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($options as $value => $text)
            <div class="flex items-center">
                <input type="checkbox" id="{{ $value }}" name="{{ $name }}[]"
                    wire:model="{{ $model }}" value="{{ $value }}"
                    class="form-check-input rounded border-gray-300 dark:border-zinc-600 dark:bg-zinc-800 dark:text-white focus:ring-blue-500">
                <label for="{{ $value }}" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                    {{ $text }}
                </label>
            </div>
        @endforeach
    </div>

    @error($model)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
