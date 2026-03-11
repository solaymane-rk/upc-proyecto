<?php

namespace App\Livewire;

use App\Models\Satellite;
use Livewire\Component;

class SatelliteStats extends Component
{
    public function simularDatos(): void
    {
        Satellite::all()->each(function ($satellite) {
            $satellite->update([
                'altitude' => rand(500, 5000),
                'velocity' => rand(10000,50000),
                'battery'  => rand(0,101)
            ]);
        });
    }

    public function render()
    {
        $satellites = Satellite::all();

        return view('livewire.satellite-stats', compact('satellites'));
    }
}
