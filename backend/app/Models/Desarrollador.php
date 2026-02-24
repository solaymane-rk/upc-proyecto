<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desarrollador extends Model
{
    use HasFactory;

    protected $table = 'desarrolladores';

    protected $fillable = [
        'nombre',
        'descripcion',
        'linkedin',
        'github',
        'foto',
    ];

    public $timestamps = false;
}
