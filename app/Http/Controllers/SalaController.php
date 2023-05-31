<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function index()
    {
       $salas = Sala::all();
       return view('index.html', compact('salas'));
    }

    public function store(Request $request)
    {
        // Validar y obtener los datos del formulario
        $datos = $request->validate([
            'tipo_sala' => 'required',
            'capacidad_asientos' => 'required',
           
        ]);

      
        // Llamar a la función agregarPelicula() del modelo Pelicula
        $sala = Sala::agregarSala(
                    $datos['tipo_sala'],
                    $datos['capacidad_asientos']
                );

        // Redireccionar o realizar alguna acción adicional
    }
}
