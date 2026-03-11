<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = ['satellite_id', 'description', 'scheduled_at', 'status'];

    public function satellite()
    {
        return $this->belongsTo(Satellite::class);
    }
}
