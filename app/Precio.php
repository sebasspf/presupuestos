<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    protected $fillable = ['producto', 'falla', 'precio', 'tiempo', 'comentario'];
    
    public function presupuesto()
    {
        return $this->belongsTo('App\Presupuesto');
    }

    public function estadoPrecio()
    {
        return $this->belongsTo('App\EstadoPrecio', 'estado_id');
    }
}
