<?php

namespace App\Models;

use App\Models\Genero;
use App\Models\Funcion;
use App\Models\ActorPrincipal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pelicula extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'peliculas';
    protected $primaryKey = 'id';
    
    protected $fillable = ['titulo','duracion'];

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }

    public function funciones()
    {
        return $this->hasMany(Funcion::class);
    }

    public function actoresPrincipales()
    {
        return $this->belongsToMany(ActorPrincipal::class, 'actuaciones');
    }
}
