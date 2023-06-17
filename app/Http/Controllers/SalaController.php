<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SalaController extends Controller
{
    public function index()
    {
       $salas = Sala::all();
       return view('admin.salas.index', compact('salas'));
    }

    public function create()
    {
        return view('admin.salas.create');
    }
    public function store(Request $request)
    {
        try {
            // Validar y obtener los datos del formulario
        $datos = $request->validate([
            'nombre' => 'required|unique:salas',
            'tipo_sala' => 'required',
            'capacidad_asientos' => 'required',
           
        ]);

      
        // Llamar a la función agregarPelicula() del modelo Pelicula
        $sala = Sala::agregarSala(
                    $datos['nombre'],
                    $datos['tipo_sala'],
                    $datos['capacidad_asientos']
                );

                // Agregar mensaje flash de éxito
            Session::flash('success', 'Se creó la sala exitosamente');
            // Redireccionar a la vista admin.peliculas.index
            return redirect()->route('admin.salas.index');
        // Redireccionar o realizar alguna acción adicional
        } catch (\Exception $e) {
             // Manejo de errores
             Session::flash('error', 'Error al crear la sala: ' . $e->getMessage());
             // Redireccionar a una vista de error o a la página anterior
             return redirect()->back();
        }
        
    }

    public function edit($id)
    {
        try {
            $sala = Sala::find($id);
            return view('admin.salas.edit', compact('sala'));
        } catch (\Exception $e) {
            Session::flash('error', 'Error al obtener la sala: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
         try {
            $datos = $request->validate([
                'nombre' => 'required',
                'tipo_sala' => 'required',
                'capacidad_asientos' => 'required',
               
            ]);

            $sala = Sala::findOrFail($id);
            $sala->nombre = $datos['nombre'];
            $sala->tipo_sala = $datos['tipo_sala'];
            $sala->capacidad_asientos = $datos['capacidad_asientos'];
            $sala->save();

            
            Session::flash('success', 'Se actualizó la sala exitosamente');
            return redirect()->route('admin.salas.index');
         } catch (\Exception $e) {
            Session::flash('error', 'Error al actualizar la sala: ');
            return redirect()->back();
         }
        


    }
}
