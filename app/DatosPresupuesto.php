<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosPresupuesto extends Model
{
    protected $table = 'datos_presupuestos';
    protected $fillable = ['nombre'];

    public function presupuesto()
    {
        return $this->belongsTo('App\Presupuesto');
    } 
}
