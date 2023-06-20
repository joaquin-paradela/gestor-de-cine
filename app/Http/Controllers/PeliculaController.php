<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Pelicula;
use App\Models\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PeliculaController extends Controller
{

    public function index()
    {
        $peliculas = Pelicula::all();
        return view('admin.peliculas.index', compact('peliculas'));
    }

    public function create()
    {
        $generos = Genero::all();
        return view('admin.peliculas.create', compact('generos'));
    }

    public function store(Request $request)
    {
        try {
            
            // Validar y obtener los datos del formulario
            $datos = $request->validate([
                'titulo' => 'required',
                'duracion' => 'required',
                'descripcion' => 'required',
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
                        $imagen,
                        $datos['descripcion']
                    );

            // Agregar mensaje flash de éxito
            Session::flash('success', 'Se creó la película exitosamente');
            // Redireccionar a la vista admin.peliculas.index
            return redirect()->route('admin.peliculas.index');
        }catch (\Exception $e) {
            // Manejo de errores
            Session::flash('error', 'Error al crear la película: ' . $e->getMessage());
            // Redireccionar a una vista de error o a la página anterior
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        // Obtener la película a editar por su ID
        $pelicula = Pelicula::findOrFail($id);
        $generos = Genero::all();
        $actoresPrincipales = $pelicula->actoresPrincipales;
    
        return view('admin.peliculas.edit', compact('pelicula', 'generos', 'actoresPrincipales'));
    }

    public function update(Request $request, $id)
    {
       // Obtener la película a actualizar
        $pelicula = Pelicula::findOrFail($id);

        // Procesar la imagen si se ha enviado una nueva
        if ($request->hasFile('imagen')) {
            // Obtener el archivo de imagen del formulario
            $imagen = $request->file('imagen');

            $rutaImagen = $pelicula->guardarImagen($imagen);
            $nombreImagen = basename($rutaImagen); // Obtener solo el nombre del archivo
            $pelicula->imagen = $nombreImagen;
            $pelicula->save();
        }

        // Actualizar los demás campos de la película
        $pelicula->titulo = $request->input('titulo');
        $pelicula->duracion = $request->input('duracion');
        $pelicula->descripcion = $request->input('descripcion');
        $pelicula->genero_id = $request->input('genero_id');

        // Guardar los cambios en la base de datos
        $pelicula->save();

        // Redireccionar o realizar alguna acción adicional
        // ...

        return redirect()->route('admin.peliculas.index')->with('success', 'Película actualizada exitosamente');
    }

    public function destroy($id)
    {
        try {
            $pelicula = Pelicula::findOrFail($id);

            $entradas = Entrada::all();

            // Buscar si la película está siendo referenciada por alguna entrada
            $referencedEntrada = $entradas->first(function ($entrada) use ($pelicula) {
                return $entrada->funcion->pelicula->id === $pelicula->id;
            });

            if ($referencedEntrada) {
                Session::flash('error', 'No se puede eliminar la película, ya que está siendo referenciada por una entrada');
                return redirect()->back();
            }

            $pelicula->delete();

            Session::flash('success', 'Pelicula eliminada correctamente');
            return redirect()->route('admin.peliculas.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error al eliminar la pelicula: ' . $e->getMessage());
            return redirect()->back();
        }
    }


    
}
