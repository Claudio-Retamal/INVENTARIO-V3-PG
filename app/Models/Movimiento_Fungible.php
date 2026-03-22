<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimiento_Fungible extends Model
{
    //

     protected $table = 'movimientos_fungibles';

    protected $fillable = [
        'fungible_id',
        'bodega_id',
        'tipo',
        'cantidad',
        'motivo',
        'user_id',
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

    // 🔥 Lógica automática de stock
    protected static function booted()
    {
        static::created(function ($movimiento) {

            $stock = Stock_fungible::firstOrCreate([
                'fungible_id' => $movimiento->fungible_id,
                'bodega_id' => $movimiento->bodega_id,
            ]);

            if ($movimiento->tipo === 'entrada') {
                $stock->cantidad += $movimiento->cantidad;
            }

            if ($movimiento->tipo === 'salida') {
                $stock->cantidad -= $movimiento->cantidad;
            }

            if ($movimiento->tipo === 'ajuste') {
                $stock->cantidad = $movimiento->cantidad;
            }

            $stock->save();
        });
    }
}
