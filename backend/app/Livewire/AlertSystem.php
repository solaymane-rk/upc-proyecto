<?php

namespace App\Livewire;

use App\Models\Satellite;
use Livewire\Component;

class AlertSystem extends Component
{
    public $satelliteId;
    public $anomalies;
    public $lastAlertTime = null;

    public function mount($satelliteId)
    {
        $this->satelliteId = $satelliteId;
        $satellite = Satellite::find($satelliteId);
        $this->anomalies = intval($satellite->anomalies_count);
    }

    public function incrementAnomaly()
    {
        $satellite = Satellite::find($this->satelliteId);
        $newCount = intval($satellite->anomalies_count) + 1;

        $satellite->update(['anomalies_count' => $newCount]);

        $this->anomalies = $newCount;
        $this->lastAlertTime = now()->format('d/m/Y H:i:s');
    }

    public function render()
    {
        return view('livewire.alert-system');
    }
}
