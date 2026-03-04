<?php

namespace App\Http\Controllers;

use App\Models\Desarrollador;
use Illuminate\Http\Request;

class DesarrolladoresController extends Controller
{
    public function index() {
        $desarrolladores = Desarrollador::all();

        return response()->json($desarrolladores);
    }
}
