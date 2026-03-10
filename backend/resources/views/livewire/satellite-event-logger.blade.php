<div class="mt-4 p-4 bg-gray-800 text-white rounded-lg" wire:poll.3s="loadEvents">
    <h4 class="font-bold text-lg mb-3">📋 Historial de Eventos</h4>
    
    {{-- Filtros (Tarea 5) --}}
    <div class="grid grid-cols-3 gap-3 mb-4">
        <select wire:model.live="filter" class="p-2 bg-gray-700 rounded text-white">
            <option value="">Todos los eventos</option>
            <option value="mode_change">Cambios de modo</option>
            <option value="alert">Alertas</option>
        </select>
        
        <input type="date" wire:model.live="dateFrom" 
               class="p-2 bg-gray-700 rounded text-white"
               placeholder="Desde">
               
        <input type="date" wire:model.live="dateTo" 
               class="p-2 bg-gray-700 rounded text-white"
               placeholder="Hasta">
    </div>
    
    {{-- Lista de eventos --}}
    <div class="space-y-3 max-h-96 overflow-y-auto">
        @forelse($events as $event)
            <div class="p-3 bg-gray-700 rounded-lg border-l-4 
                        {{ $event['event_type'] == 'alert' ? 'border-red-500' : 'border-blue-500' }}">
                
                <div class="flex justify-between items-start">
                    <div>
                        <span class="text-sm text-gray-300">
                            {{ \Carbon\Carbon::parse($event['created_at'])->format('d/m/Y H:i:s') }}
                        </span>
                        
                        <p class="font-bold mt-1">
                            @if($event['event_type'] == 'mode_change')
                                🔄 Cambio de modo: 
                                <span class="text-yellow-400">{{ $event['old_value'] }}</span> 
                                → 
                                <span class="text-green-400">{{ $event['new_value'] }}</span>
                            @elseif($event['event_type'] == 'alert')
                                🚨 Alerta registrada
                                <span class="text-red-400">(Anomalías: {{ $event['new_value'] }})</span>
                            @endif
                        </p>
                        
                        @if($event['description'])
                            <p class="text-sm text-gray-400 mt-1">{{ $event['description'] }}</p>
                        @endif
                    </div>
                    
                    <span class="text-xs px-2 py-1 rounded 
                        {{ $event['event_type'] == 'alert' ? 'bg-red-900 text-red-200' : 'bg-blue-900 text-blue-200' }}">
                        {{ $event['event_type'] }}
                    </span>
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-center py-4">No hay eventos registrados</p>
        @endforelse
    </div>
</div>
