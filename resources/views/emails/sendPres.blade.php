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
                                    <p> Detalles del presupuesto:</p><br>

                                    @foreach($presupuesto->precios->where('estado_id',2) as $precio)
                                        
                                        <p><em>Producto:</em> {{$precio->producto}}</p>
                                        <p><em>Falla:</em> {{$precio->falla}}</p>
                                        <p><em>Precio:</em> ${{$precio->precio}}</p>
                                        <p><em>Tiempo:</em> {{$precio->tiempo}} días</p>
                                        <br>
                                    @endforeach

                                    @if($presupuesto->precios->contains('estado_id',5))
                                        <p>Lamentablemente, no podemos presupuestar estos servicios:</p><br>
                                        @foreach($presupuesto->precios->where('estado_id',5) as $precio)
                                            <p><em>Producto:</em> {{$precio->producto}}</p>
                                            <p><em>Falla:</em> {{$precio->falla}}</p>
                                            <p><em>Precio:</em> --- </p>
                                            <p><em>Tiempo:</em> --- </p>
                                            <br>
                                        @endforeach
                                    @endif

                                    <p>Para aceptar o rechazar los presupuestos, debe ir al siguiente enlace:</p>
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