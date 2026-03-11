<div class="mt-3 pt-3 border-t border-gray-800">
    <p class="text-xs text-gray-600 uppercase mb-1">Modo de operación</p>

    <div class="flex items-center gap-3">
        <select
            wire:model.live="mode"
            wire:loading.attr="disabled"
            class="bg-gray-800 border border-gray-700 text-gray-200 text-sm px-3 py-1.5 rounded focus:outline-none focus:border-gray-500 disabled:opacity-50"
        >
            <option value="" disabled>Seleccionar modo</option>
            <option value="Standby">Standby</option>
            <option value="Científico">Científico</option>
            <option value="Maniobra" {{ $battery < 20 ? 'disabled' : '' }}>Maniobra</option>
        </select>

        <span wire:loading class="text-xs text-gray-500">Enviando comando...</span>
    </div>

    @error('mode')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
