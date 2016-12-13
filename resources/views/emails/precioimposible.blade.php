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
                <tr>
                    <td>
                        <table style="border:1px solid #dce1e5; padding:10px" width="100%" cellspacing="0"
                        cellpadding="0" border="0" bgcolor="#ffffff">
                            <tbody>
                                <tr>
                                    <td>
                                        <h3>No podremos realizar el manteniemiento / reparación en uno de sus productos.
                                        Ya se encuentra disponible para retirarlo. Disculpas por los problemas que esto
                                        pueda ocasionar.</h3>
                                        <p> El producto es el siguente:</p><br>
   
                                        <p><em>Producto:</em> {{$precio->producto}}</p>
                                        <p><em>Falla:</em> {{$precio->falla}}</p>
                                        <p><em>Precio:</em> ${{$precio->precio}}</p>
                                        <p><em>Tiempo:</em> {{$precio->tiempo}} días</p>
                                        <br>

                                        <p>Puede ver detalles y los otros productos (si los hubiere) de su presupuesto en este enlace: </p>
                                        <p><a href='http://presupuestos.app/presupuestos?clave={{$precio->presupuesto->clave}}'>
                                            http://presupuestos.app/presupuestos?clave={{$precio->presupuesto->clave}}
                                        </a></p>
                                        <br>
                                        <p>También puede ver su presupuesto desde <a href="http://presupuestos.app">
                                        la página principal</a> ingresando el siguiente código: <strong>{{$precio->presupuesto->clave}}</strong>    
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