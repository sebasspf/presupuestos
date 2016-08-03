<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoPrecio extends Model
{
    
    protected $table = 'estados_precio';

    public function precios()
    {
        return $this->hasMany('App\Precio','estado_id');
    }

}
