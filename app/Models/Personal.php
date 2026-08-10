<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Personal extends Model
{

    protected $table = 'personals';

    use HasFactory;
    protected $fillable = ['nombres', 'apellidos', 'cargo_id', 'sala_id', 'active'];

    //Muchos personales tienen un cargo
    /*   public function Sala()
    {
        return $this->hasMany(Sala::class); // La clave foránea en la tabla 'personal' es 'sala_id'
    }

     public function Cargo()
    {
        return $this->hasMany(Cargo::class); // La clave foránea en la tabla 'personal' es 'sala_id'
    } */

}
