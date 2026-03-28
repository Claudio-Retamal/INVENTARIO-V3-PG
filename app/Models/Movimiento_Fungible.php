<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimiento_Fungible extends Model
{
    //

     protected $table = 'movimiento_fungibles';

    protected $fillable = [
        'fungible_id',
        'tipo',
        'cantidad',
        'stock_anterior',
        'stock_actual',
        'motivo',
        'referencia',
        'personal_id',
        'sala_id',
        'fecha_movimiento',

    ];

    protected $casts = [
        'fecha_movimiento' => 'date',
    ];

    // 🔗 Relaciones
    public function fungible()
    {
        return $this->belongsTo(Fungible::class, 'fungible_id');
    }

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }

      public function sala()
    {
        return $this->belongsTo(Sala::class);
    }

    // 🎨 Para colores en Filament
    public function getTipoColorAttribute()
    {
        return match ($this->tipo) {
            'entrada' => 'success',
            'salida' => 'danger',
            'ajuste' => 'warning',
        };
    }
}
