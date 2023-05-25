<?php

namespace App\Models;

use App\Models\Pelicula;
use App\Models\ActorPrincipal;
use Illuminate\Database\Eloquent\Model;

class Actuacion extends Model
{
    protected $table = 'actuaciones'; //tabla a la que hare referencia el modelo
    protected $primaryKey = 'id'; // Nombre de la columna de clave primaria
    public $timestamps = false;

    protected $fillable = [];

    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class, 'pelicula_id');
    }

    public function actor()
    {
        return $this->belongsTo(ActorPrincipal::class, 'principales_id');
    }
}
