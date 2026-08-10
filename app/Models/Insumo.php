<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    protected $table = 'insumos';

    protected $fillable = [
        'nombre',
        'marca',
        'tipo_insumos_id',
        'impresora_id',
    ];

    public function tipoInsumo()
    {
        return $this->belongsTo(TipoInsumo::class, 'tipo_insumos_id');
    }
    public function impresora()
    {
        return $this->hasOne(Impresora::class, 'impresora_id');
    }
}
