<?php

namespace App\Livewire;

use App\Models\Satellite;
use Livewire\Component;

class SatelliteCommander extends Component
{
    public $mode;
    public $satelliteId;
    public $battery;

    public function mount($satelliteId, $mode, $battery)
    {
        $this->satelliteId = $satelliteId;
        $this->battery = $battery;

        // Si la batería es baja al cargar, forzamos Standby
        if ($battery < 20) {
            Satellite::find($satelliteId)->update(['mode' => 'Standby']);
            $this->mode = 'Standby';
        } else {
            $this->mode = $mode;
        }
    }

    public function updatedMode($value)
    {
        // Validación real en el servidor
        if ($value === 'Maniobra' && $this->battery < 20) {
            $this->addError('mode', 'No se puede activar Maniobra con batería inferior al 20%.');
            // Revertimos al valor anterior en BD
            $this->mode = Satellite::find($this->satelliteId)->mode;
            return;
        }

        $this->resetErrorBag('mode');

        Satellite::find($this->satelliteId)->update(['mode' => $value]);
    }

    public function render()
    {
        return view('livewire.satellite-commander');
    }
}
