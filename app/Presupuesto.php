<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    /*
    * id int(10)
    * comentario text
    * clave varchar(255)
    * cliente_id int(11)
    * estado_id int(11)
    * estadoant_id int(11)
    * created_at tiemstamp
    * updated_at timestamp
    */
    protected $fillable =  ['comentario','clave'];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function datosPresupuesto()
    {
        return $this->hasOne('App\DatosPresupuesto');
    }

    public function precios()
    {
        return $this->hasMany('App\Precio');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function estadoant()
    {
        return $this->belongsTo('App\Estado');
    }

    public function addPrecio(Precio $precio)
    {
        $this->precios()->save($precio);
    }

    public function addDatos(DatosPresupuesto $datos)
    {
        $this->datosPresupuesto()->save($datos);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($presupuesto){
            $presupuesto->precios()->delete();
        });
    }

}
