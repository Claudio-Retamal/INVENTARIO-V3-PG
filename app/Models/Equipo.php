<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    //
    protected $fillable = ['nombre', 'numero_serial', 'modelo', 'marca', 'color', 'descripcion', 'categoria_id', 'sala_id', 'personal_id', 'estado'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class); // La clave foránea en la tabla 'personal' es 'sala_id'
    }

      public function personal()
    {
        return $this->belongsTo(Personal::class); // La clave foránea en la tabla 'personal' es 'sala_id'
    }
}
