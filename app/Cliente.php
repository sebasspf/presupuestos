<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    
    public function presupuestos()
    {
        return $this->hasMany('App\Presupuesto');
    }

}
