<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria_fungible extends Model
{
    //

     protected $fillable = ['nombre', 'tipo','active'];

    public function fungibles()
    {
        return $this->hasMany(Fungible::class);
    }
}
