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
        $oldCount = intval($satellite->anomalies_count);
        $newCount = $oldCount + 1;

        $satellite->update(['anomalies_count' => $newCount]);
        $this->anomalies = $newCount;

        $satellite->recordEvent(
            'alert',
            $oldCount,
            $newCount,
            "Anomalía registrada. Total acumulado: {$newCount}"
        );
    }
}