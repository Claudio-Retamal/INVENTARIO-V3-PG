<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecambioTinta extends Model
{

    protected $table = 'recambio_tintas';

    protected $fillable = [
        'id',
        'fungible_id',
        'equipo_id',
        'personal_id',
        'tipo_consumible',
        'cantidad_usada',
        'color',
        'observacion'
    ];

    public function fungible()
    {
        return $this->belongsTo(Fungible::class);
    }
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }
    public function detalles_recambio_tinta()
    {
        return $this->hasMany(DetalleRecambioTinta::class);
    }
}
