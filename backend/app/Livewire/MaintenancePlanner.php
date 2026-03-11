<?php

namespace App\Livewire;

use App\Models\Satellite;
use App\Models\Maintenance;
use Livewire\Component;

class MaintenancePlanner extends Component
{
    public $satelliteId = '';
    public $description = '';
    public $scheduledAt = '';

    public function schedule()
    {
        $satellite = Satellite::find($this->satelliteId);

        if ($satellite->mode === 'Maniobra') {
            $this->addError('satelliteId', 'No se puede programar mantenimiento mientras el satélite está en Modo Maniobra.');
            return;
        }

        if ($satellite->maintenances()->where('status', 'Pendiente')->exists()) {
            $this->addError('satelliteId', 'Este satélite ya tiene un mantenimiento pendiente.');
            return;
        }

        $this->validate([
            'satelliteId' => 'required|exists:satellites,id',
            'description' => 'required|min:5',
            'scheduledAt' => 'required|date|after:now',
        ]);

        Maintenance::create([
            'satellite_id' => $this->satelliteId,
            'description'  => $this->description,
            'scheduled_at' => $this->scheduledAt,
            'status'       => 'Pendiente',
        ]);

        $this->reset(['description', 'scheduledAt', 'satelliteId']);
    }

    public function complete($maintenanceId)
    {
        Maintenance::find($maintenanceId)->update(['status' => 'Completado']);
    }

    public function render()
    {
        $satellites = Satellite::all();

        $maintenances = Maintenance::with('satellite')
            ->where('status', 'Pendiente')
            ->orderBy('scheduled_at')
            ->get();

        return view('livewire.maintenance-planner', compact('satellites', 'maintenances'));
    }
}
