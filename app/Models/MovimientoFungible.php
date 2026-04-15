<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimientoFungible extends Model
{
    //
    protected $table = 'movimiento_fungibles';

    protected $fillable = [
        'id',
        'fungible_id',
        'cantidad',
        'tipo',
        'fecha',
        'personal_id',
        'sala_id',
        'stock_anterior',
        'stock_actual',
        'motivo',
    ];


    public function fungible()
    {
        return $this->belongsTo(Fungible::class);
    }

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }
}
