<?php

namespace App\Livewire;

use App\Models\Satellite;
use App\Models\SatelliteEvent;
use Livewire\Component;

class SatelliteCommander extends Component
{
    public $mode;
    public $satelliteId;
    public $battery;
    public $satellite;

    public function mount($satelliteId, $mode, $battery)
    {
        //ESTO ES PARA LAS TAREAS 1 HASTA AL 4
        // if ($this->battery < 20) {
        //     Satellite::find($this->satelliteId)->update(['mode' => 'StandBy']);
        // }

        $this->satelliteId = $satelliteId;
        $this->mode = $mode;
        $this->battery = $battery;
        $this->satellite = Satellite::find($satelliteId); // ← CARGA EL SATÉLITE

        // Si batería baja al iniciar, forzar StandBy
        if ($this->satellite && $this->battery < 20) {
            $this->satellite->update(['mode' => 'StandBy']);
            $this->mode = 'StandBy';
        }
    }

    public function render()
    {
        return view('livewire.satellite-commander');
    }


    public function updatedMode($value)
    {
        //     //TAREAS 1 HASTA AL 4
        //     // Satellite::find($this->satelliteId)->update(['mode' => $value]);

        $satellite = Satellite::find($this->satelliteId);
        $oldMode = $satellite->mode;

        $satellite->update(['mode' => $value]);

        // Registrar el evento de cambio de modo
        $satellite->recordEvent(
            'mode_change',
            $oldMode,
            $value,
            "Modo cambiado de '{$oldMode}' a '{$value}'"
        );

        $this->dispatch('eventRegistered')->to('satellite-event-logger');
    }

}
