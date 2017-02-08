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
    protected $fillable =  ['comentario','clave','estado_id', 'estadoant_id'];

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

    public function scopeFilter($query, $filters)
    {
        if ($tipopres = $filters['tipopres']) {
            $query->where('estado_id', request('tipopres'));
        }
    }

    public static function crearClave()
    {
        $repetido = true;
        while ($repetido) {
            $clave = crearClave(10);
            static::where('clave',$clave)->first() ?: $repetido = false;
        }
        return $clave;
    }

    public function finalizar()
    {
        $this->update(['estadoant_id' => $this->estado_id, 'estado_id' => 4]);
    }

    public function reanudar()
    {
        $this->update(['estado_id' => $this->estadoant_id]);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($presupuesto){
            $presupuesto->precios()->delete();
        });
    }

}
