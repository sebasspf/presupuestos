<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Presupuesto;
use App\Cliente;

class PresupuestosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    

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


    public function store(Request $request)
    {
        $presupuesto = new Presupuesto;

        if($request->cliente_id == 0){
            $this->validar_presupuesto($request);
            $cliente = Cliente::create(['nombre'=>$request->nombre, 'email'=>$request->email]);
            $presupuesto->cliente_id = $cliente->id;
        }else{
            $presupuesto->cliente_id = $request->cliente_id;
        }

        $presupuesto->clave = $this->claveUnica();
        $presupuesto->comentario = $request->comentario;

        $presupuesto->save();
        flash('success', 'El presupuesto se agrego correctamente');
        return back();
    }


    protected function validar_presupuesto(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|unique:clientes',
            'nombre' => 'required'
        ]);
    }




}
