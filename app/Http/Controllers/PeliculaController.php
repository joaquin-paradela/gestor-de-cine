<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{

    public function index()
    {
        $peliculas = Pelicula::getPeliculas();
        return view('admin/peliculas/index', compact('peliculas'));
    }

    public function show()
    {

    }

    public function create()
    {
        return view('admin.peliculas.create');
    }

    
}
