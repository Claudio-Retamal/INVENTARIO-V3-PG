<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impresora extends Model
{

    use HasFactory;
    
    protected $table = 'impresoras';

    protected $fillable = [
        'nombre',
        'modelo',
        'serie',
        'tipo_impresora',
        'insumo_id',
        'fecha_ingreso',
        'estado_impresora',
        'estado',
    ];
    protected $casts = ['fecha_ingreso' => 'date', 'estado' => 'boolean',];

    public function Insumo()
    {
        return $this->hasOne(Insumo::class, 'insumo_id' );
    }
}
