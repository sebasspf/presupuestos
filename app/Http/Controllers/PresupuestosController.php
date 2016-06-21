<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Presupuesto;

class PresupuestosController extends Controller
{
    protected function crearClave()
    {
        $factory = new \RandomLib\Factory;
        $generator = $factory->getLowStrengthGenerator();
        return $generator->generateString(10);
    }

    protected function claveUnica()
    {
        $repetido = true;
        while($repetido)
        {
            $clave = $this->crearClave();
            Presupuesto::where('clave',$clave)->first() ?: $repetido = false;
        }
        return $clave;
    }

    public function addForm()
    {
        return view('admin.addForm');
    }




}
