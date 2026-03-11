<?php

namespace App\Livewire;

use App\Models\Satellite;
use Livewire\Component;

class SatelliteBrowser extends Component
{
    public string $search = '';

    public function render()
    {
        $satellites = Satellite::query()
            ->when($this->search, function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                  ->orWhere('norad_id', 'like', "%{$this->search}%");
            })
            ->get();

        return view('livewire.satellite-browser', compact('satellites'));
    }
}
