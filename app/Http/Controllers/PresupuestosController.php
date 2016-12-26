<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
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
        $presupuesto->comentario = $request->comentario;
        $presupuesto->estado_id = $request->estado;
        $presupuesto->save();
        flash('success', 'El presupuesto se modificó correctamente');
        return redirect('/admin/presupuestos/'.$presupuesto->id);
    }

    public function addForm()
    {
        return view('admin.addForm');
    }


    public function list(Request $request)
    {
        $estados = Estado::all();

        $query = Presupuesto::with('cliente','datosPresupuesto')
                 ->orderBy('updated_at', 'desc');
        if (isset($request->tipopres) && $request->tipopres <> '0'){
            $query->where('estado_id', $request->tipopres);
        }
        $presupuestos = $query->paginate(12);

        return view('admin.list', [
            'presupuestos' => $presupuestos,
            'estados' => $estados,
            'tipopres' => $request->tipopres
        ]);
    }

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


    public function store(Request $request)
    {

        if ($request->email !== '') {
            $cliente = Cliente::where('email',$request->email)->first();
            if ($cliente) {
                $cliente->actualizar($request);
            } else {
                $this->validar_cliente($request);
                $cliente = Cliente::create(['nombre'=>$request->nombre, 'email'=>$request->email]);
            }
        }

        $presupuesto = new Presupuesto;
        $presupuesto->clave = $this->claveUnica();
        $presupuesto->comentario = $request->comentario;
        $presupuesto->estado_id = 1;

        if ($request->email !== '') {
            $cliente->addPresupuesto($presupuesto);
        } else {
            $presupuesto->save();
            $datos = DatosPresupuesto::create(['nombre'=>$request->nombre]);
            $presupuesto->addDatos($datos);
        }

        flash('success', 'El presupuesto se agrego correctamente');
        return back();
    }


    public function send(Presupuesto $presupuesto)
    {
        $presupuesto->load('precios');

        if ($presupuesto->precios->isEmpty()) {
            flash('danger', 'No hay precios para enviar en el presupuesto');
            return back();
        }

        Mail::send('emails.sendPres', ['presupuesto'=>$presupuesto], function ($m) use ($presupuesto) {
            $m->from('info@velpres.com', 'Sistema Velpres');
            $m->to($presupuesto->cliente->email,$presupuesto->cliente->nombre)
                ->subject('Nuevo presupuesto de Velpres');
        });

        $presupuesto->estado_id = 2;
        $presupuesto->update();

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

    public function switch(Presupuesto $presupuesto)
    {
        if($presupuesto->estado->descripcion == 'finalizado')
        {
            $presupuesto->estado_id = $presupuesto->estadoant_id;
        }else{
            $presupuesto->estadoant_id = $presupuesto->estado_id;
            $presupuesto->estado_id = 4;
        }
        $presupuesto->update();
        flash('success', 'El presupuesto se modificó correcatamente');
        return back();

    }


    protected function claveUnica()
    {
        $repetido = true;
        while ($repetido) {
            $clave = crearClave(10);
            Presupuesto::where('clave',$clave)->first() ?: $repetido = false;
        }
        return $clave;
    }


    protected function validar_cliente(Request $request)
    {
        $this->validate($request, [
            'email' => 'email',
            'nombre' => 'required'
        ]);
    }

    protected function validar_clave(Request $request)
    {
        $this->validate($request, [
            'clave' => 'required|alpha_num|size:10'
        ]);
    }

}
