@extends('emails.layout')

@section('content')

<div style="background-color:#fbfbfb">
    <table style="background:#fbfbfb" width="600" align="center" cellspacing="0" cellpadding="0" 
    border="0" bgcolor="#fbfbfb">
        <tbody>
            <tr>
                <td>
                    <h1 style="font-family:Tahoma; font-size:28px;">Sistema Velpres</h1>
                </td>
            </tr>
            </tr>
                <td>
                    <table style="border:1px solid #dce1e5; padding:10px" width="100%" cellspacing="0"
                    cellpadding="0" border="0" bgcolor="#ffffff">
                        <tbody>
                            <tr>
                                <td>
                                    <h3>Su nuevo presupuesto está disponible</h3>
                                    <p> Los precios son los siguientes:</p><br>

                                    @foreach($presupuesto->precios as $precio)
                                        
                                        <p><em>Producto:</em> {{$precio->producto}}</p>
                                        <p><em>Falla:</em> {{$precio->falla}}</p>
                                        <p><em>Precio:</em> ${{$precio->precio}}</p>
                                        <p><em>Tiempo:</em> {{$precio->tiempo}} días</p>
                                        <br>
                                    @endforeach

                                    <p>Puede ver su presupuesto y aceptar / rechazar en el siguiente enlace: </p>
                                    <p><a href='http://presupuestos.app/presupuestos?clave={{$presupuesto->clave}}'>
                                        http://presupuestos.app/presupuestos?clave={{$presupuesto->clave}}
                                    </a></p>
                                    <br>
                                    <p>También puede ver su presupuesto desde <a href="http://presupuestos.app">
                                    la página principal</a> ingresando el siguiente código: <strong>{{$presupuesto->clave}}</strong>    
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>
    

@endsection