<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Sala;
use Illuminate\Http\Request;

class FuncionController extends Controller
{



    public function create()
    {
        $peliculas = Pelicula::all();
        $salas = Sala::all();

        return view('admin.funciones.create', compact('peliculas', 'salas'));
    }



    public function store(Request $request)
    {
        // Validar y obtener los datos del formulario
        $datos = $request->validate([
            'fecha' => 'required',
            'hora_inicio' => 'required',
            'precio_entrada' => 'required',
            'sala_id' => 'required',
            'pelicula_id' => 'required'
        ]);

     

        // Llamar a la función agregarPelicula() del modelo Pelicula
        $funcion = Funcion::agregarFuncion(
                    $datos['fecha'],
                    $datos['hora_inicio'],
                    $datos['precio_entrada'],
                    $datos['sala_id'],
                    $datos['pelicula_id']
                );

        // Redireccionar o realizar alguna acción adicional
    }
}
