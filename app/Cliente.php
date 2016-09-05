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

    public function actualizar($request)
    {
        if ($this->nombre <> $request->nombre) {
            $this->nombre = $request->nombre;
            $this->save();
        }
    }

}
