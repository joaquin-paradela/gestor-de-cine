<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\User;
use App\Models\Funcion;
use App\Models\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EntradaController extends Controller
{
    
    /*
    public function boleteria($peliculaId)
    {
        $pelicula = Pelicula::find($peliculaId);
        $funciones = $pelicula->funciones;
        return view('boleteria', compact('pelicula','funciones'));
    }
    */
    //code clean
    public function boleteria($peliculaId)
    {
        $pelicula = Pelicula::with('funciones')->find($peliculaId);
        return view('boleteria', compact('pelicula'));
    }


    /*
        public function checkout(Request $request)
        {
            // Lógica de validación y procesamiento del formulario
        
            
            // Obtener los datos necesarios para la vista
            $fechaSeleccionada = $request->fecha;
            $horaSeleccionada = $request->hora_inicio;
            $cantidadEntradas = $request->cantidad_entradas_compradas;
            $funcionSeleccionada = Funcion::where('fecha', $fechaSeleccionada)
                                            ->where('hora_inicio', $horaSeleccionada)
                                            ->first();
            $precioEntrada = $funcionSeleccionada->precio_entrada;
        
            // Calcular el precio total
            $precioTotal = $cantidadEntradas * $precioEntrada;

        
            // Redirigir a la vista "checkout" y pasar los datos necesarios
            return view('checkout')->with([
                        'fechaSeleccionada' => $fechaSeleccionada,
                        'horaSeleccionada' => $horaSeleccionada,
                        'cantidadEntradas' => $cantidadEntradas,
                        'precioEntrada' => $precioEntrada,
                        'precioTotal' => $precioTotal,
                        'funcionSeleccionada' => $funcionSeleccionada
                    ]);
        }
    */ 
    //code clean
    private function procesarFormulario(Request $request)
    {
            // Lógica de validación y procesamiento del formulario

            // Obtener los datos necesarios para la vista
            $fechaSeleccionada = $request->fecha;
            $horaSeleccionada = $request->hora_inicio;
            $cantidadEntradas = $request->cantidad_entradas_compradas;
            $funcionSeleccionada = Funcion::where('fecha', $fechaSeleccionada)
                                            ->where('hora_inicio', $horaSeleccionada)
                                            ->first();
            $precioEntrada = $funcionSeleccionada->precio_entrada;

            // Calcular el precio total
            $precioTotal = $cantidadEntradas * $precioEntrada;

            // Retornar un array con los datos necesarios
            return [
                'fechaSeleccionada' => $fechaSeleccionada,
                'horaSeleccionada' => $horaSeleccionada,
                'cantidadEntradas' => $cantidadEntradas,
                'precioEntrada' => $precioEntrada,
                'precioTotal' => $precioTotal,
                'funcionSeleccionada' => $funcionSeleccionada
            ];
    }

    public function checkout(Request $request)
    {
            $datosCompra = $this->procesarFormulario($request);

            // Redirigir a la vista "checkout" y pasar los datos necesarios
            return view('checkout')->with($datosCompra);
    }

    public function store(Request $request)
    {
        try {
            
        
            // Obtener el ID del cliente autenticado
                $userId = Auth::id();
                $funcionId =  $request->funcionSeleccionada;
                // Obtener los datos del formulario
                $fechaSeleccionada = $request->input('fechaSeleccionada');
                $horaSeleccionada = $request->input('horaSeleccionada');
                $cantidadEntradas = $request->input('cantidadEntradas');
                $precioTotal = $request->input('precioTotal');
                $precioUnitario = $request->input('precioUnitario');
               

               // Obtener la función y verificar la disponibilidad de asientos
            $funcion = Funcion::find($funcionId);

            if (!$funcion->tieneAsientosDisponibles($cantidadEntradas)) {
                Session::flash('error', 'No hay suficientes asientos disponibles');
                return redirect()->back();
            }


            $funcion->decrement('asientos_disponibles', $cantidadEntradas);
            // Actualizar los asientos disponibles en una transacción
            $funcion->save();


                
              
                // Obtener el usuario autenticado
                $user = Auth::user();

                if ($request->formaPago === 'puntos') {
                    // Calcular la cantidad de puntos necesarios para comprar las entradas
                    $puntosNecesarios = $cantidadEntradas * 20;
                    
                    // Verificar si el usuario tiene suficientes puntos para realizar la compra
                    if ($puntosNecesarios > $user->puntos_acumulados) {
                        Session::flash('error', 'No tenes los puntos necesarios para realizar la compra');
                        return redirect()->back();
                    }
            
                    // Restar los puntos utilizados del total acumulado del usuario
                    $user->puntos_acumulados -= $puntosNecesarios;
                    $user->save();

                    $puntosObtenidos = 0;
                } else {
                      // Calcular los puntos obtenidos
                    $puntosObtenidos = $cantidadEntradas * 5;
                    // Actualizar los puntos acumulados del usuario
                    $user->puntos_acumulados += $puntosObtenidos;
                    $user->save();
                }
                
                // Obtener la fecha actual
                $fechaCompra = date('Y-m-d');
                $horaCompra = date('H:i:s');
                
                // Guardar los datos en la base de datos
                $entrada =  Entrada::agregarEntrada(
                                $cantidadEntradas,
                                $precioUnitario,
                                $precioTotal,
                                $puntosObtenidos,
                                $fechaCompra,
                                $horaCompra,
                                $funcionId,
                                $userId
                            );
               
            // Redireccionar a una página de éxito y pasar el ID de la entrada como parámetro
            return redirect()->route('comprarealizada', ['entradaId' => $entrada->id]);

        } catch (Exception $e) {
                // Manejar cualquier excepción y redirigir con un mensaje de error
                Session::flash('error', 'Error al procesar la compra: ' . $e->getMessage());
                return redirect()->back();
                    
          }
          
    }

    public function compraRealizada($entradaId)
    {
        $entrada = Entrada::with('usuario', 'funcion')->find($entradaId);

        if (!$entrada) {
            // Manejar la situación si la entrada no existe
            return redirect()->route('error')->with('message', 'La entrada no existe.');
        }

       // Agregar mensaje flash de éxito
       Session::flash('success', 'Compra realizada con éxito');
        return view('comprarealizada', compact('entrada'));
    }

    public function historial()
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        $puntostotales = $user->puntos_acumulados;

        $entradas = $user->entradas()
                            ->with(['funcion' => function ($query) {
                                $query->withTrashed(); // Incluir funciones eliminadas lógicamente
                            }, 'funcion.pelicula'])
                            ->orderByDesc('id')
                            ->get();
       

        return view('historial', ['entradas' => $entradas, 'puntostotales' => $puntostotales]);
    }
}
