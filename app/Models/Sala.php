<?php

namespace App\Models;

use App\Models\Funcion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Sala extends Model
{
    use HasFactory;

    protected $table = 'salas';
    protected $primaryKey = 'id';

    protected $fillable = ['tipo_sala', 'capacidad_asientos'];

    public function funciones()
    {
        return $this->hasMany(Funcion::class);
    }

    public function getSalas()
    {
        $salas = Sala::all();
        return $salas;
    }

}
