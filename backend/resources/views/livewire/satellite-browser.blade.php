<div>
    <input wire:model.live.debounce.300ms="search" type="search" placeholder="Nombre satelite"/> 
    <H1>HOLA</H1>
    <select>
        <select wire:model.live="columnSearch" wire:loading.attr="disabled">
        <option value="" disabled>Escoge una opción</option>
        <option value="name">Nombre</option>
        <option value="norad_id">Norad Id</option>
    </select>
    <livewire:satellite-stats :satellites="$this->satellites">
</div>
