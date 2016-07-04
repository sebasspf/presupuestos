<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $fillable =  ['comentario','clave'];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function precios()
    {
        return $this->hasMany('App\Precio');
    }

    public function addPrecio(Precio $precio)
    {
        $this->precios()->save($precio);
    }
}
