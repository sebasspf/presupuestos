<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nombre', 'email'];
    
    public function presupuestos()
    {
        return $this->hasMany('App\Presupuesto');
    }

    public function addPresupuesto(Presupuesto $presupuesto)
    {
        $this->presupuestos()->save($presupuesto);
    }

}
