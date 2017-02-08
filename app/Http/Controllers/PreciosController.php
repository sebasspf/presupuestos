<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Event;

use App\Precio;
use App\Presupuesto;
use App\EstadoPrecio;
use App\Events\PrecioCambiaEstado;

class PreciosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['respond']]);
    }

    public function store(Request $request, Presupuesto $presupuesto)
    {
        $this->validar_precio($request);

        $precio = new Precio(request(['producto', 'falla', 'precio', 'tiempo']));
        $precio->estado_id = $request->posible ? 2 : 5;
        
        $presupuesto->addPrecio($precio);

        flash('success', 'El precio se agregó corectamente');
        return back();
    }

    public function respond(Request $request)
    {
        $presupuesto = Presupuesto::where('clave',$request->clave)->firstOrFail();

        foreach($presupuesto->precios->where('estado_id',2) as $precio){
            // 1 Y 3 son los ID de precio aceptado y rechazado respectivamente
            $precio->estado_id = (int)$request->prec[$precio->id] ? 1 : 3;
            $precio->save();
        }

        $presupuesto->update(['estado_id' => 3]);

        flash('success', 'Los presupuestos se aceptaron / rechazaron correctamente');

        return back();

    }

    public function show(Precio $precio)
    {
        $estados = EstadoPrecio::all();
        return view('admin.precio',
             ['precio'=>$precio, 'estados'=>$estados]
        );
    }

    public function update(Request $request, Precio $precio)
    {
        if ($precio->estado_id <> $request->estado) {
            $precio->update(['estado_id' => $request->estado]);
            Event::fire(new PrecioCambiaEstado($precio));
            flash('success', 'El precio se actualizó correctamente.');
        }
        return redirect('/admin/presupuestos/'.$precio->presupuesto->id); 
    }

    protected function validar_precio(Request $request)
    {
        $this->validate($request, [
            'producto' => 'required',
            'falla' => 'required',
            'precio' => 'required|numeric',
            'tiempo' => 'required|numeric',
            'posible' => 'required'
        ]);
    }

}
