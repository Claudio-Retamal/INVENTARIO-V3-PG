<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialPrestacion extends Model
{
    //

    protected $fillable = ['fecha_prestacion','fecha_devolucion', 'personal_id','cargo_id', 'sala_id', 'equipo_id', 'active'];

     public function Personal()
    {
        return $this->belongsTo(Personal::class);
    }

    public function Cargo()
    {
        return $this->belongsTo(Cargo::class); // La clave foránea en la tabla 'personal' es 'sala_id'
    }

     public function Sala()
    {
        return $this->belongsTo(Sala::class); // La clave foránea en la tabla 'personal' es 'sala_id'
    }

     public function Equipo()
    {
        return $this->belongsTo(Equipo::class); // La clave foránea en la tabla 'personal' es 'sala_id'
    }
}
