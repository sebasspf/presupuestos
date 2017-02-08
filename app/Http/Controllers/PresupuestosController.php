<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Mail\Nuevo;
use App\Http\Requests;
use App\Presupuesto;
use App\Cliente;
use App\DatosPresupuesto;
use App\Estado;
use DB;

class PresupuestosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['showUser']
        ]);
    }

    public function show(Presupuesto $presupuesto)
    {
        $presupuesto->load('precios');
        return view('admin.pres', ['presupuesto' => $presupuesto]);
    }

    public function delete(Presupuesto $presupuesto)
    {
        $presupuesto->delete();
        flash('success', 'El presupuesto fue eliminado');
        return  redirect('/admin/lista');
    }

    public function update(Presupuesto $presupuesto, Request $request)
    {
        $presupuesto->update(request(['comentario', 'estado_id']));
        flash('success', 'El presupuesto se modificó correctamente');
        return redirect('/admin/presupuestos/'.$presupuesto->id);
    }

    public function store(Request $request)
    {
        $presupuesto = new Presupuesto([
            'clave' => Presupuesto::crearClave(),
            'comentario' => $request->comentario
        ]);

        // En caso de que el presupuesto tenga un cliente
        if ($request->email) {
            $this->validar_cliente($request);
            if ($cliente = Cliente::where('email',$request->email)->first()) {
                $cliente->actualizar($request);
            } else {
                $cliente = Cliente::create(request(['nombre', 'email']));
            }
            $cliente->addPresupuesto($presupuesto);

        } else {

        // Si el presupuesto no tiene cliente
            $presupuesto->save();
            $presupuesto->addDatos(new DatosPresupuesto(request(['nombre'])));
        }

        flash('success', 'El presupuesto se agrego correctamente');
        return back();
    }

    public function addForm()
    {
        return view('admin.addForm');
    }

    public function list(Request $request)
    {
        $estados = Estado::all();

        $presupuestos = Presupuesto::latest()
            ->with('cliente', 'datosPresupuesto')
            ->filter(request(['tipopres']))
            ->paginate(12);

        return view('admin.list', [
            'presupuestos' => $presupuestos,
            'estados' => $estados,
            'tipopres' => $request->tipopres
        ]);
    }

    // Muestro el presupuesto al usuario, fuera del admin
    public function showUser(Request $request)
    {

        $presupuesto = Presupuesto::where('clave',$request->clave)->firstOrFail();
        $presupuesto->load('precios');

        switch ($presupuesto->estado->descripcion) {
            case "enviado":
                return view('pages.pres', ['presupuesto' => $presupuesto]);
                break;

            case "pendiente":
            case "terminado":
                return view('pages.finalPres', ['presupuesto' => $presupuesto]);
                break;

            case "nuevo":
                return abort(404);
        }

    }


    public function send(Presupuesto $presupuesto)
    {
        $presupuesto->load('precios');

        if ($presupuesto->precios->isEmpty()) {
            flash('danger', 'No hay precios para enviar en el presupuesto');
            return back();
        }

        Mail::to($presupuesto->cliente->email)->send(new Nuevo($presupuesto));

        $presupuesto->update(['estado_id' => 2]);

        flash('success', 'El email se envió correctamente');
        return back();
    }

    public function showEdit(Presupuesto $presupuesto)
    {
        $estados = Estado::All();
        $presupuesto->load('cliente','datosPresupuesto');
        return view('admin.editPres',[
            'presupuesto' => $presupuesto,
            'estados' => $estados
        ]);
    }

    // Finaliza o reanuda el presupuesto
    public function switch(Presupuesto $presupuesto)
    {
        if ($presupuesto->estado->descripcion == 'finalizado')
        {
            $presupuesto->reanudar();
        } else {
            $presupuesto->finalizar();
        }

        flash('success', 'El presupuesto se modificó correcatamente');
        return back();
    }

    protected function validar_cliente(Request $request)
    {
        $this->validate($request, [
            'email' => 'email',
            'nombre' => 'required'
        ]);
    }

}
