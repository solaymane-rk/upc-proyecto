<div>
    <p>Modo de maniobra: {{ $mode }}</p>

    <select wire:model.live="mode" wire:loading.attr="disabled">
        <option value="" disabled>Escoge una opción</option>
        <option value="Standby">Standby</option>
        <option value="Científico">Científico</option>
        <option value="Maniobra" {{ $battery < 20 ? 'disabled' : '' }}>Maniobra</option>
    </select>

    <p wire:loading>Enviando comando al satélite...</p>
    @error('mode')
        <p class="text-red-500 mt-1">{{ $message }}</p>
    @enderror
</div>