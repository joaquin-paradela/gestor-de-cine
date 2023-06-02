<?php

namespace App\Models;

use App\Models\Funcion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Entrada extends Model
{
    use HasFactory;

    protected $table = 'entradas';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['cantidad_entradas_compradas','precio_unitario', 'precio_total', 'puntos_obtenidos','fecha_compra', 'hora_compra', 'numero_asiento', 'funcion_id'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function funcion()
    {
        return $this->belongsTo(Funcion::class, 'funcion_id');
    }

    public static function agregarEntrada($cantidad_entradas_compradas, $precio_unitario, $precio_total, $puntos_obtenidos, $fecha_compra, $hora_compra, $funcionId, $userId)
    {
        $entrada = new Entrada();
        $entrada->funcion_id = $funcionId;
        $entrada->user_id = $userId;
        $entrada->cantidad_entradas_compradas = $cantidad_entradas_compradas;
        $entrada->precio_unitario = $precio_unitario;
        $entrada->precio_total = $precio_total;
        $entrada->puntos_obtenidos = $puntos_obtenidos;
        $entrada->fecha_compra = $fecha_compra;
        $entrada->hora_compra = $hora_compra;
        $entrada->save();
        

        return $entrada;
    }

}
