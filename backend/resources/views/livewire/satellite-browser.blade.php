<div>
    <p class="text-xs text-gray-500 uppercase tracking-widest mb-2">Buscador de satélites</p>
    <input
        wire:model.live.debounce.300ms="search"
        type="search"
        placeholder="Nombre o NORAD ID..."
        class="w-full bg-gray-900 border border-gray-700 text-gray-200 text-sm px-3 py-2 rounded focus:outline-none focus:border-gray-500"
    />

    @forelse ($satellites as $satellite)
        <div class="mt-3 px-4 py-3 bg-gray-900 border border-gray-800 rounded">
            <p class="text-sm font-semibold text-white">{{ $satellite->name }}</p>
            <p class="text-xs text-gray-500">NORAD: {{ $satellite->norad_id }}</p>
        </div>
    @empty
        <p class="text-sm text-gray-600 mt-4">Sin resultados.</p>
    @endforelse
</div>
