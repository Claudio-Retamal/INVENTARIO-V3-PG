<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoInsumo extends Model
{
    //
    use HasFactory;
    protected $table = 'tipo_insumos';

    protected $fillable = [
        'nombre',
        'estado',
       
    ];
    protected $casts = [
        'estado' => 'boolean',
    ];

    public function insumos()
    {
        return $this->hasMany(Insumo::class);
    }
}
