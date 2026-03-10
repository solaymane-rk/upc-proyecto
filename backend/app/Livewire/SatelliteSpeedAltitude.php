<?php

namespace App\Livewire;

use App\Models\Satellite;
use Livewire\Component;

class SatelliteSpeedAltitude extends Component
{
    public $satelliteId;
    public $select;
    public $speed;
    public $altitude;
    
    public function mount(){
        $satellite = Satellite::find($this->satelliteId);
        $this->select = 'speed';
        $this->speed = intval($satellite->velocity);
        $this->altitude = intval($satellite->altitude);
    }

    public function updatedAltitude($value){
        $this->altitude = $value;
        $satellite = Satellite::find($this->satelliteId);
        $satellite->update(['altitude' => $this->altitude]);
    }

    public function updatedSpeed($value){
        $this->speed = $value;
        $satellite = Satellite::find($this->satelliteId);
        $satellite->update(['velocity' => $this->speed]);
    }

    public function render()
    {
        return view('livewire.satellite-speed-altitude');
    }
}
