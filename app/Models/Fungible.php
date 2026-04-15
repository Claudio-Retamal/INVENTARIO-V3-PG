<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fungible extends Model
{
    //

    protected $table = 'fungibles';

    protected $fillable = [
        'nombre',
        'descripcion',
        'marca',
        'modelo',
        'categoria_fungible_id',
        'unidad_medida',
        'stock_actual',
        'stock_minimo',
        'active'
    ];

    public function categoria_fungible()
    {
        return $this->belongsTo(Categoria_fungible::class);
    }

   public function movimiento_fungible()
    {
        return $this->hasMany(MovimientoFungible::class);
    }

/* 
    public function stocks()
    {
        return $this->hasMany(Stock_Fungible::class);
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento_Fungible::class);
    } */
}
