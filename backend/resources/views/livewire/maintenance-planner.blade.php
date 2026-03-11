<div wire:poll.10s>
    <p class="text-xs text-gray-500 uppercase tracking-widest mb-4">Planificador de mantenimiento</p>

    <div class="bg-gray-900 border border-gray-800 rounded p-4 mb-6">
        <div class="grid grid-cols-1 gap-3">

            <div>
                <label class="text-xs text-gray-600 uppercase">Satélite</label>
                <select
                    wire:model.live="satelliteId"
                    class="w-full mt-1 bg-gray-800 border border-gray-700 text-gray-200 text-sm px-3 py-2 rounded focus:outline-none focus:border-gray-500"
                >
                    <option value="">Seleccionar satélite</option>
                    @foreach ($satellites as $satellite)
                        <option value="{{ $satellite->id }}">{{ $satellite->name }}</option>
                    @endforeach
                </select>
                @error('satelliteId')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-xs text-gray-600 uppercase">Descripción</label>
                <input
                    wire:model.live="description"
                    type="text"
                    placeholder="Descripción del mantenimiento..."
                    class="w-full mt-1 bg-gray-800 border border-gray-700 text-gray-200 text-sm px-3 py-2 rounded focus:outline-none focus:border-gray-500"
                />
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-xs text-gray-600 uppercase">Fecha programada</label>
                <input
                    wire:model.live="scheduledAt"
                    type="datetime-local"
                    class="w-full mt-1 bg-gray-800 border border-gray-700 text-gray-200 text-sm px-3 py-2 rounded focus:outline-none focus:border-gray-500"
                />
                @error('scheduledAt')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button
                wire:click="schedule"
                wire:loading.attr="disabled"
                class="mt-2 text-sm px-4 py-2 bg-gray-800 border border-gray-700 rounded hover:border-gray-500 hover:text-white transition-colors disabled:opacity-50"
            >
                <span wire:loading.remove>Programar mantenimiento</span>
                <span wire:loading class="text-gray-500">Guardando...</span>
            </button>
        </div>
    </div>

    @forelse ($maintenances as $maintenance)
        <div class="mb-3 px-4 py-3 bg-gray-900 border border-gray-800 rounded flex items-center justify-between">
            <div>
                <p class="text-sm font-semibold text-white">{{ $maintenance->satellite->name }}</p>
                <p class="text-xs text-gray-500">{{ $maintenance->description }}</p>
                <p class="text-xs text-gray-600">{{ \Carbon\Carbon::parse($maintenance->scheduled_at)->format('d/m/Y H:i') }}</p>
            </div>
            <button
                wire:click="complete({{ $maintenance->id }})"
                class="text-xs px-3 py-1.5 bg-gray-800 border border-gray-700 rounded hover:border-green-700 hover:text-green-400 transition-colors"
            >
                <span wire:loading.remove wire:target="complete({{ $maintenance->id }})">Completar</span>
                <span wire:loading wire:target="complete({{ $maintenance->id }})" class="text-gray-500">...</span>
            </button>
        </div>
    @empty
        <p class="text-sm text-gray-600">No hay mantenimientos pendientes.</p>
    @endforelse
</div>
