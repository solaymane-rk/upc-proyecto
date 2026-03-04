<?php

namespace App\Livewire;

use App\Models\Satellite;
use Livewire\Component;

class AlertSystem extends Component
{
    public $satelliteId;
    public function render()
    {
        return view('livewire.alert-system');
    }

    public function incrementAnomaly() {
        $satellite = Satellite::find($this->satelliteId);
        $anomalyCout = $satellite->anomalies_count;
        $satellite->update(['anomalies_count' => $anomalyCout]);
    }
}
