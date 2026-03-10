<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SatelliteEvent extends Model
{
    protected $fillable = [
        'satellite_id', 
        'event_type', 
        'old_value', 
        'new_value', 
        'description'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function satellite()
    {
        return $this->belongsTo(Satellite::class);
    }
}
