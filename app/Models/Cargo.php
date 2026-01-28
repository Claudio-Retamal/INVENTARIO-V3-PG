<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tipo_cargo',
        'estado'
    ];

    public function Personal()
    {
        return $this->belongsTo(Personal::class);
    }
}
