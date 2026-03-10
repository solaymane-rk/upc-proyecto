<?php

namespace App\Livewire\Satellite;

use App\Models\Satellite;
use Livewire\Component;

class SatelliteStats extends Component
{
    public $satellites;
    public $search;

    public function mount() {
        $this->apiConsumer();
    }

    public function updatedSearch($value){
        $this->search = $value;
        $this->apiConsumer();
    }

    public function apiConsumer(){
        // $this->satellites = Satellite::all();
        $this->satellites = Satellite::query()
        ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%"))
        ->get();
    }

    public function render()
    {
        return view('livewire.satellite.satellite-stats');
    }

}