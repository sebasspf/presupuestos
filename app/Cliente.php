<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /*
    * id int(10)
    * email varchar(255)
    * nombre varchar(255)
    * telefono varchar(255)
    * created_at timestamp
    * updated_at timestamp
    */
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
