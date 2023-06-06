<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    
    public function index()
    {
        $generos = Genero::all();

        return view('admin.generos.index', compact('generos'));
    }

    public function show()
    {

    }

    public function create()
    {
        return view('admin.generos.create');
        
    }
    public function store()
    {
        
    }
    public function edit($id)
    {

    }

}
