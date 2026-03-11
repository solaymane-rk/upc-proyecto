<div class="mt-3 pt-3 border-t border-gray-800">
    <button
        wire:click="incrementAnomaly"
        class="text-sm px-3 py-1.5 bg-gray-800 border border-gray-700 rounded hover:border-red-700 hover:text-red-400 transition-colors"
    >
        <span wire:loading.remove>Anomalías detectadas: {{ $anomalies }}</span>
        <span wire:loading class="text-gray-500">Registrando...</span>
    </button>

    @if ($lastAlertTime)
        <p class="text-xs text-gray-600 mt-1">Última alerta: {{ $lastAlertTime }}</p>
    @endif
</div>
