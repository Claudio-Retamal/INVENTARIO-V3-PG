<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestacion extends Model
{

    use HasFactory;
    protected $fillable = ['nombre', 'motivo', 'fecha_prestacion', 'fecha_devolucion', 'observacion', 'personal_id', 'equipo_id', 'sala_id', 'active'];

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }

    

    
}
