<?php

namespace App\Livewire;

use App\Models\Satellite;
use Livewire\Component;

class SatelliteStats extends Component
{
    public $satellites;

    public function mount() {
        $this->apiConsumer();
    }

    public function apiConsumer(){
        $this->satellites = Satellite::all();
    }

    public function render()
    {
        return view('livewire.satellite-stats');
    }

}
