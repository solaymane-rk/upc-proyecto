<div wire:poll.5s="simularDatos">
    <p class="text-xs text-gray-500 uppercase tracking-widest mb-4">Telemetría en tiempo real</p>

    @foreach ($satellites as $satellite)
        <div class="mb-6 p-4 bg-gray-900 border border-gray-800 rounded">
            <p class="text-base font-semibold text-white mb-2">{{ $satellite->name }}</p>

            <div class="grid grid-cols-3 gap-4 text-sm text-gray-400 mb-3">
                <div>
                    <p class="text-xs text-gray-600 uppercase">Altitud</p>
                    <p class="text-white">{{ $satellite->altitude }} km</p>
                </div>
                <div>
                    <p class="text-xs text-gray-600 uppercase">Velocidad</p>
                    <p class="text-white">{{ $satellite->velocity }} km/h</p>
                </div>
                <div>
                    <p class="text-xs text-gray-600 uppercase">Batería</p>
                    <p class="{{ $satellite->battery > 15 ? 'text-green-400' : 'text-red-500' }} font-semibold">
                        {{ $satellite->battery }}%
                    </p>
                </div>
            </div>

            <livewire:satellite-commander
                :mode="$satellite->mode"
                :satelliteId="$satellite->id"
                :battery="$satellite->battery"
                wire:key="commander-{{ $satellite->id }}"
            />
            <livewire:alert-system
                :satelliteId="$satellite->id"
                wire:key="satellite-{{ $satellite->id }}"
            />
        </div>
    @endforeach
</div>
