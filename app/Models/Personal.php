<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{

    protected $fillable = ['nombres', 'apellidos', 'cargos_id', 'salas_id', 'estado'];
   
    //Muchos personales tienen un cargo
    public function sala()
    {
        return $this->belongsTo(Sala::class); // La clave foránea en la tabla 'personal' es 'sala_id'
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class); // La clave foránea en la tabla 'personal' es 'cargo_id'
    }

}
