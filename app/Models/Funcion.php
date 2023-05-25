<?php

namespace App\Models;

use App\Models\Entrada;
use App\Models\Sala;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Funcion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'funciones';
    protected $primaryKey = 'id';

    protected $fillable = ['fecha','hora_inicio', 'precio_entrada'];

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }
}
