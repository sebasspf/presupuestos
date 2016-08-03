<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Precio;
use App\Presupuesto;

class PreciosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Presupuesto $presupuesto)
    {
        $this->validar_precio($request);

        $precio = new Precio;
        $precio->producto = $request->producto;
        $precio->falla = $request->falla;
        $precio->precio = $request->precio;
        $precio->tiempo = $request->tiempo;
        $precio->estado_id = 2;

        $presupuesto->addPrecio($precio);

        flash('success', 'El precio se agregó corectamente');
        return back();
    }

    public function respond(Request $request)
    {
        $presupuesto = $presupuesto = Presupuesto::where('clave',$request->clave)->firstOrFail();

        foreach($presupuesto->precios as $precio){
            // 1 Y 3 son los ID de precio aceptado y rechazado respectivamente
            $precio->estado_id = (int)$request->prec[$precio->id] ? 1 : 3;
            $precio->save();
        }

        $presupuesto->estado_id = 3;
        $presupuesto->save();

        flash('success', 'Los presupuestos se aceptaron / rechazaron correctamente');

        return back();

    }

    protected function validar_precio(Request $request)
    {
        $this->validate($request, [
            'producto' => 'required',
            'falla' => 'required',
            'precio' => 'required|numeric',
            'tiempo' => 'required|numeric',
        ]);
    }
}
