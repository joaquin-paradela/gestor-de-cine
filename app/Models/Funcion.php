<?php

namespace App\Models;

use App\Models\Entrada;
use App\Models\Sala;
use App\Models\Pelicula;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Funcion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'funciones';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['fecha','hora_inicio', 'precio_entrada', 'sala_id', 'pelicula_id'];

    public function entradas()
    {
         return $this->hasMany(Entrada::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }
    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class);
    }

    public static function agregarFuncion($fecha, $hora_inicio, $precio_entrada, $peliculaId, $salaId)
    {
        $funcion = new Funcion();
        $funcion->fecha = $fecha;
        $funcion->hora_inicio = $hora_inicio;
        $funcion->precio_entrada = $precio_entrada;
        $funcion->pelicula_id = $peliculaId;
        $funcion->sala_id = $salaId;
        $funcion->save();

        return $funcion;
    }
}
