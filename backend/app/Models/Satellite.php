<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satellite extends Model
{
    /** @use HasFactory<\Database\Factories\SatelliteFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'norad_id',
        'altitude',
        'velocity',
        'battery',
        'mode',
        'anomalies_count'
    ];

    // ★★★★★ TAREA 5: MÉTODOS PARA EVENTOS ★★★★★
    public function recordEvent($type, $oldValue, $newValue, $description = null)
    {
        return $this->events()->create([
            'event_type' => $type,
            'old_value' => $oldValue,
            'new_value' => $newValue,
            'description' => $description
        ]);
    }

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

}
