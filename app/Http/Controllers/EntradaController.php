<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function boleteria($peliculaId)
    {
        $pelicula = Pelicula::find($peliculaId);
        $funciones = $pelicula->funciones;
        return view('boleteria', compact('pelicula', 'funciones'));
    }
}
