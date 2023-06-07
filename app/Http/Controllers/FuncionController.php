<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Sala;
use App\Models\Funcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FuncionController extends Controller
{

    public function buscar(Request $request)
    {
        
    $busqueda = $request->input('busqueda');

        //búsqueda según los criterios (nombre de película, actor principal, tipo de sala)
        $funciones = Funcion::whereHas('pelicula', function ($query) use ($busqueda) {
                                $query->where('titulo', 'LIKE', '%' . $busqueda . '%')
                                        ->orWhereHas('actoresPrincipales', function ($query) use ($busqueda) {
                                            $query->where('nombre_actor', 'LIKE', '%' . $busqueda . '%');
                                        });
                            })
                            ->orWhereHas('sala', function ($query) use ($busqueda) {
                                $query->where('tipo_sala', 'LIKE', '%' . $busqueda . '%');
                            })
                            ->get();

        // películas filtradas según la búsqueda
        $peliculas = $funciones->map(function ($funcion) {
                        return $funcion->pelicula;
                    })->unique();

        // Pasar las películas filtradas a la vista
        return view('bienvenida', compact('peliculas'));
    }
    public function index()
    {
        // Obtener todas las funciones, incluidas las eliminadas lógicamente
        $funciones = Funcion::withTrashed()->orderByDesc('id')->get();
        return view('admin.funciones.index', compact('funciones'));
    }
    public function carrusel()
    {
        $peliculas = Pelicula::has('funciones')->get()->unique();

        return view('bienvenida', compact('peliculas'));
    }

    public function create()
    {
        $peliculas = Pelicula::all();
        $salas = Sala::all();

        return view('admin.funciones.create', compact('peliculas', 'salas'));
    }

    public function edit($id)
    {
        $funcion = Funcion::withTrashed()->find($id);

        if (!$funcion) {
            // Si no se encuentra la función, redirigir o mostrar un mensaje de error
            return redirect()->back()->with('error', 'Función no encontrada');
        }

        // Retornar la vista de edición con la función
        return view('admin.funciones.edit', compact('funcion'));
    }

    public function update(Request $request, $id)
    {
        $funcion = Funcion::find($id);

        if (!$funcion) {
            // Si no se encuentra la función, puedes redirigir o mostrar un mensaje de error
            return redirect()->back()->with('error', 'Función no encontrada');
        }

        // Validar los datos del formulario
        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'precio_entrada' => 'required|numeric',
        ]);

        // Actualizar los campos de la función con los datos del formulario
        $funcion->fecha = $request->input('fecha');
        $funcion->hora_inicio = $request->input('hora_inicio');
        $funcion->precio_entrada = $request->input('precio_entrada');

        // Guardar los cambios en la base de datos
        $funcion->save();

        // Redireccionar a la vista de funciones con un mensaje de éxito
        return redirect()->route('admin.funciones.index')->with('success', 'Función actualizada correctamente');
    }



    public function store(Request $request)
    {
        try{
            // Validar y obtener los datos del formulario
            $datos = $request->validate([
                'fecha' => 'required',
                'hora_inicio' => 'required',
                'precio_entrada' => 'required',
                'sala_id' => 'required',
                'pelicula_id' => 'required'
            ]);

        

            // Llamar a la función agregarFuncion() del modelo Funcion
            $funcion = Funcion::agregarFuncion(
                        $datos['fecha'],
                        $datos['hora_inicio'],
                        $datos['precio_entrada'],
                        $datos['pelicula_id'],
                        $datos['sala_id']
                    );

            // Agregar mensaje flash de éxito
            Session::flash('success', 'Creación de función exitosa');
            return redirect()->route('admin.funciones.index');
        }catch (\Exception $e) {
            // Manejo de errores
            Session::flash('error', 'Error al crear la función: ' . $e->getMessage());
            // Redireccionar a una vista de error a la página anterior
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {

            $funcion = Funcion::findOrFail($id);
            $funcion->delete();
    
            Session::flash('success', 'Función eliminada correctamente');
            return redirect()->route('admin.funciones.index');
        } catch (\Exception $e) {
            
            Session::flash('error', 'Error al eliminar la función: ' . $e->getMessage());
            return redirect()->back();
        }
      
    }
}
