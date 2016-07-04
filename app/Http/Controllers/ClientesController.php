<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cliente;

class ClientesController extends Controller
{
    public function getJson($email)
    {
        $cliente = Cliente::where('email',$email)->first();
        if($cliente) {
            $resultado = ['resultado'=>'exito','cliente'=>$cliente->toArray()];
        }else{
            $resultado = ['resultado'=>'falla', ];
        }

        //return json_encode($resultado);
        return response()->json($resultado);

    }
}
