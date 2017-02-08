<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    /*
    * id int(10)
    * presupuesto_id int(10)
    * producto varchar(255)
    * falla varchar(255)
    * precio double(15,2)
    * comentario text
    * tiempo int(11)
    * created_at tiemstamp
    * updated_at timestamp
    * estado_id int(11)
    */
    protected $fillable = ['producto', 'falla', 'precio', 'tiempo', 'comentario', 'estado_id'];
    
    public function presupuesto()
    {
        return $this->belongsTo('App\Presupuesto');
    }

    public function estadoPrecio()
    {
        return $this->belongsTo('App\EstadoPrecio', 'estado_id');
    }
}
