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
}
