<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoPrecio extends Model
{
    /*
    * id int(10)
    * created_at timestamp
    * updated_t timestamp
    * descripcion varchar(255)
    * color varchar(255)
    * email tinyint(1)
    */
    protected $table = 'estados_precio';

    public function precios()
    {
        return $this->hasMany('App\Precio','estado_id');
    }

}
