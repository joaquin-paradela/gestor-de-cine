<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Sala;
use App\Models\Funcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FuncionController extends Controller
{

    public function index()
    {
        $funciones = Funcion::all();
        return view('admin.funciones.index', compact('funciones'));
    }



    public function create()
    {
        $peliculas = Pelicula::all();
        $salas = Sala::all();

        return view('admin.funciones.create', compact('peliculas', 'salas'));
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
            // Redireccionar a una vista de error o a la página anterior
            return redirect()->back();
        }
    }
}
