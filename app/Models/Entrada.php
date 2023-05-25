<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Funcion;
use App\Models\User;


class Entrada extends Model
{
    use HasFactory;

    protected $table = 'entradas';
    protected $primaryKey = 'id';

    protected $fillable = ['cantidad_entradas_compradas','precio_unitario', 'precio_total', 'puntos_obtenidos', 'hora_compra', 'numero_asiento'];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function funcion()
    {
        return $this->belongsTo(Funcion::class);
    }

}
