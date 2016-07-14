<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Http\Requests;
use App\Presupuesto;
use App\Cliente;

class PresupuestosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['showUser']
        ]);
    }


    public function addForm()
    {
        return view('admin.addForm');
    }


    public function list()
    {
        $presupuestos = Presupuesto::with('cliente')
                            ->orderBy('updated_at', 'desc')
                            ->paginate(12);
        return view('admin.list', ['presupuestos' => $presupuestos]);
    }

    public function show(Presupuesto $presupuesto)
    {
        $presupuesto->load('precios');
        return view('admin.pres', ['presupuesto' => $presupuesto]);
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

            case "nuevo":
                return abort(404);
        }

    }

    public function store(Request $request)
    {

        if ($request->cliente_id == 0) {
            $this->validar_cliente($request);
            $cliente = Cliente::create(['nombre'=>$request->nombre, 'email'=>$request->email]);
        } else {
            $cliente = Cliente::find($request->cliente_id);
        }

        $presupuesto = new Presupuesto;
        $presupuesto->clave = $this->claveUnica();
        $presupuesto->comentario = $request->comentario;
        $presupuesto->estado_id = 1;

        $cliente->addPresupuesto($presupuesto);

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
            'email' => 'email|unique:clientes',
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
