<?php

namespace App\Livewire;

use App\Models\Satellite;
use Livewire\Component;

class SatelliteBrowser extends Component
{
    public $search;
    public $satellites = [];
    public $columnSearch = 'name';

    public function mount(){
        $this->satellites = Satellite::all();
    }
    public function render()
    {
        return view('livewire.satellite-browser');
    }

    public function updatedSearch($value){
        $this->satellites = Satellite::query()
        ->when($this->search, fn($q) => $q->where($this->columnSearch, 'like', "%{$this->search}%"))
        ->get();
    }
}
