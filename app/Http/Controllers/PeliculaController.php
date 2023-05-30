<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{

    public function index()
    {
        $peliculas = Pelicula::all();
        return view('admin/peliculas/index', compact('peliculas'));
    }

    public function show()
    {

    }

    public function create()
    {
        $generos = Genero::all();
        return view('admin.peliculas.create', ['generos' => $generos]);
    }

    public function store(Request $request)
    {
        // Validar y obtener los datos del formulario
        $datos = $request->validate([
            'titulo' => 'required',
            'duracion' => 'required',
            'genero_id' => 'required',
        ]);

        // Obtener los actores principales seleccionados
        $actoresPrincipales = $request->input('actores_principales');

        // Obtener la imagen del formulario
        $imagen = $request->file('imagen');

        // Llamar a la función agregarPelicula() del modelo Pelicula
        $pelicula = Pelicula::agregarPelicula(
                    $datos['titulo'],
                    $datos['duracion'],
                    $datos['genero_id'],
                    $actoresPrincipales,
                    $imagen
                );

        // Redireccionar o realizar alguna acción adicional
    }

    public function edit($id)
    {
            // Obtener la película a editar por su ID
            $pelicula = Pelicula::findOrFail($id);

            return view('admin.peliculas.edit', compact('pelicula'));
    }

    public function update(Request $request, $id)
    {
        // Validar y obtener los datos del formulario
        $datos = $request->validate([
            'titulo' => 'required',
            'duracion' => 'required',
            'genero_id' => 'required',
            
        ]);

        // Obtener la película a editar por su ID
        $pelicula = Pelicula::findOrFail($id);

        // Llamar a la función editarPelicula() del modelo Pelicula
        $pelicula->editarPelicula($datos);

        // Redireccionar o realizar alguna acción adicional
    }

    
}
