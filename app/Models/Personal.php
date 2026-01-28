<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{

    use HasFactory;
    protected $fillable = ['nombres', 'apellidos', 'cargos_id', 'salas_id', 'estado'];

    //Muchos personales tienen un cargo
    public function Sala()
    {
        return $this->hasMany(Sala::class); // La clave foránea en la tabla 'personal' es 'sala_id'
    }

     public function Cargo()
    {
        return $this->hasMany(Cargo::class); // La clave foránea en la tabla 'personal' es 'sala_id'
    }
}
