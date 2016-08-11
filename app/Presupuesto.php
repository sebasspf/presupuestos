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

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function addPrecio(Precio $precio)
    {
        $this->precios()->save($precio);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($presupuesto){
            $presupuesto->precios()->delete();
        });
    }

}
