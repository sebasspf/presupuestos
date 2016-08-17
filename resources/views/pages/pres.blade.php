@extends('pages.layout')

@section('title','VESPRES -- Ver mi presupuesto')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Su presupuesto detallado</h1>
                @if(!$presupuesto->precios->isEmpty())
                    <form method="POST" action="#">

                        @foreach($presupuesto->precios->where('estado_id',2) as $precio)
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <p><strong>Producto: </strong>{{$precio->producto}}</p>
                                    <p><strong>Falla: </strong>{{$precio->falla}}</p>
                                    <p><strong>Tiempo: </strong>{{$precio->tiempo}} días</p>
                                    <p><strong>Precio: </strong>${{$precio->precio}}</p>
                                    
                                    <label class="radio-inline">
                                        <input type="radio" name="prec[{{$precio->id}}]" id="{{$precio->id}}-opcion-1" 
                                        value="1" checked>
                                        Aceptar
                                    </label>  

                                    <label class="radio-inline">
                                        <input type="radio" name="prec[{{$precio->id}}]" id="{{$precio->id}}-opcion-0" 
                                        value="0">
                                        Rechazar
                                    </label>  
                                    
                                </div>
                            </div>
                        @endforeach
                        {{ csrf_field() }}
                        <button class="btn btn-default" type="submit">Responder</button>
                    </form><br>

                    @if($presupuesto->precios->contains('estado_id',5))
                        <p>Lamentablemente, uno o más servicios no pueden presupuestarse:</p>
                        @foreach($presupuesto->precios->where('estado_id',5) as $precio)
                            <p><strong>Producto: </strong>{{$precio->producto}}</p>
                            <p><strong>Falla: </strong>{{$precio->falla}}</p>
                            <p><strong>Tiempo: </strong>---</p>
                            <p><strong>Precio: </strong>---</p>
                        @endforeach
                        <div class="alert alert-info" role="alert"><strong>Atención:</strong>
                        Puedes pasar a retirar los productos que no se han podido presupuestar cuando deseés.
                        </div>
                    @endif

                @endif
            </div>
        </div>
    </div>

@endsection