<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestacion extends Model
{

    use HasFactory;
    protected $fillable = ['nombre', 'motivo', 'fecha_prestacion', 'fecha_devolucion', 'personal_id', 'equipo_id', 'estado'];

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}
