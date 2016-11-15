<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosPresupuesto extends Model
{
    /*
    * id int(10)
    * nombre varchar(255)
    * telefono varchar(255)
    * presupuesto_id int(10)
    * created_at timestamp
    * updated_at timestamp
    */
    protected $table = 'datos_presupuestos';
    protected $fillable = ['nombre'];

    public function presupuesto()
    {
        return $this->belongsTo('App\Presupuesto');
    } 
}
