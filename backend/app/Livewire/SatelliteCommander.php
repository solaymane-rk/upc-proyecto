<?php

namespace App\Livewire;

use App\Models\Satellite;
use Livewire\Component;

class SatelliteCommander extends Component
{
    public $mode;
    public $satelliteId;
    public $battery;

    public function mount(){
        if ($this->battery < 20) {
            Satellite::find($this->satelliteId)->update(['mode' => 'StandBy']);
        }
    }

    public function render()
    {
        return view('livewire.satellite-commander');
    }

    public function updatedMode($value)
    {
        Satellite::find($this->satelliteId)->update(['mode' => $value]);
    }
}
