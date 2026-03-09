<?php

namespace App\Livewire;

use App\Models\Satellite;
use Livewire\Component;

class AlertSystem extends Component
{
    public $satelliteId;
    public $anomalies;

    public function mount(){
        $satellite = Satellite::find($this->satelliteId);
        $this->anomalies = intval($satellite->anomalies_count);
    }

    public function render()
    {
        return view('livewire.alert-system');
    }

    public function incrementAnomaly() {
        $satellite = Satellite::find($this->satelliteId);
        $anomalyCount = intval($satellite->anomalies_count)+1;
        $satellite->update(['anomalies_count' => $anomalyCount]);
        $this->anomalies = $anomalyCount;
    }
}
