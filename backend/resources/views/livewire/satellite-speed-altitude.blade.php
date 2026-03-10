<div class="mt-2">
    
    <p>Cambiar parametros</p>
    @if ($select == 'speed')
        <input wire:model.live.debounce.300ms="speed" wire:loading.attr="disabled" > 
    @endif
    @if ($select == 'altitude')
        <input wire:model.live.debounce.300ms="altitude" wire:loading.attr="disabled"  >    
    @endif
    <select wire:model.live="select" wire:loading.attr="disabled">
        <option value="speed" selected>Speed</option>
        <option value="altitude">Altitude</option>
    </select>
    <p wire:loading wire:target="speed, altitude">Cargando cambios...</p>
    <p wire:loading wire:target="select">Seleccionando...</p>
</div>
