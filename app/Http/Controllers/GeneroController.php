<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    public function store(Request $request)
    {
        try {
            $datos = $request->validate(['nombre' => 'required']);

            $genero = Genero::agregarGenero($datos['nombre']);
            Session::flash('success', 'Se creó el genero exitosamente');
            // Redireccionar a la vista admin.peliculas.index
            return redirect()->route('admin.generos.index');
        } catch (\Exception $e) {

            Session::flash('error', 'Error al crear el genero: ' . $e->getMessage());
            // Redireccionar a una vista de error o a la página anterior
            return redirect()->back();
        }
        
    }
    public function edit($id)
    {

    }

    public function destroy($id)
    {
        try {
            $genero = Genero::find($id);
            $genero->delete();
            Session::flash('success', 'Se eliminó el genero exitosamente');
            // Redireccionar a la vista admin.peliculas.index
            return redirect()->route('admin.generos.index');
        
        } catch (\Exception $e) {

            return redirect()->back();
        }
        
    }

}
