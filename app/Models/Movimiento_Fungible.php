<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimiento_Fungible extends Model
{
    //

     protected $table = 'movimientos_fungibles';

    protected $fillable = [
        'fungible_id',
        'sala_id',
        'tipo',
        'cantidad',
        'motivo',
        'personal_id',
        'fecha_movimiento'
    ];

    protected $casts = [
        'fecha_movimiento' => 'datetime',
    ];

    // Relaciones
    public function fungible()
    {
        return $this->belongsTo(Fungible::class);
    }

    public function bodega()
    {
        return $this->belongsTo(Bodega::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
