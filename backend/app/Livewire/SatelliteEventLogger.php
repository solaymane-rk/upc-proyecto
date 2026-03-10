<?php

namespace App\Livewire;

use App\Models\SatelliteEvent;
use Livewire\Component;
use Livewire\Attributes\On;

class SatelliteEventLogger extends Component
{
    public $satelliteId;
    public $events = [];
    public $filter = '';
    public $dateFrom = '';
    public $dateTo = '';

    public function mount($satelliteId)
    {
        $this->satelliteId = $satelliteId;
        $this->loadEvents();
    }

    public function loadEvents()
    {
        $query = SatelliteEvent::where('satellite_id', $this->satelliteId)
            ->latest();

        if ($this->filter) {
            $query->where('event_type', $this->filter);
        }

        if ($this->dateFrom) {
            $query->whereDate('created_at', '>=', $this->dateFrom);
        }

        if ($this->dateTo) {
            $query->whereDate('created_at', '<=', $this->dateTo);
        }

        $this->events = $query->limit(50)->get()->toArray();
    }

    public function updatedFilter()
    {
        $this->loadEvents();
    }

    public function updatedDateFrom()
    {
        $this->loadEvents();
    }

    public function updatedDateTo()
    {
        $this->loadEvents();
    }

    public function render()
    {
        return view('livewire.satellite-event-logger');
    }
}
