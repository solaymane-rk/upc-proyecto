<div>
    <input wire:model.live.debounce.300ms="search" type="search" placeholder="Nombre satelite"/>
    {{ $search }}
    <livewire:satellite-stats :satellites="$this->satellites">
</div>