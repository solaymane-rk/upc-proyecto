<div>
<input wire:model.live.debounce.300ms="search" type="search" placeholder="Nombre satelite"/>
<div wire:poll.2s="apiConsumer">
    @foreach ($satellites as $satellite)
    <div class="border-b">
        <p class="text-3xl text-black">Satelite: {{ $satellite->name }}</p>
        <p class="text-xl">Altitud: <span class="text-black">{{ $satellite->altitude }} m</span></p>
        <p class="text-xl">Velocity: <span class="text-black">{{ $satellite->velocity }} km/h</span></p>
        <p class="text-xl">Bateria:  <span style="color: {{ $satellite->battery > 15 ? 'green' : 'red' }}" >{{ $satellite->battery }}%</span> </p>
        <livewire:satellite-commander
        :mode="$satellite->mode"
        :satelliteId="$satellite->id"
        :battery="$satellite->battery"
        wire:key="commander-{{ $satellite->id }}">
        <livewire:alert-system :satelliteId="$satellite->id" wire:key="satellite-{{ $satellite->id }}" />
        <livewire:satellite-event-logger :satelliteId="$satellite->id" wire:key="logger-{{ $satellite->id }}" />
    </div>
    @endforeach
</div>
</div>