<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sala extends Model
{
    //
     use HasFactory;

       protected $table = 'salas';

    protected $fillable = [
        'nombre',
        'tipo_sala',
        'numero_equipos',
        'active'
    ];


    public function movimiento_fungible()
    {
        return $this->hasMany(MovimientoFungible::class);
    }


    public function prestacion()
    {
        return $this->hasMany(Prestacion::class);
    }
 
}
