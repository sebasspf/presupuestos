@extends('pages.layout')

@section('title','VESPRES -- Ver mi presupuesto')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Su presupuesto detallado</h1>
                @include('components.flash')
                
                @foreach($presupuesto->precios as $precio)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p><strong>Producto: </strong>{{$precio->producto}}</p>
                            <p><strong>Falla: </strong>{{$precio->falla}}</p>
                            <p><strong>Tiempo: </strong>{{$precio->tiempo}} días</p>
                            <p><strong>Precio: </strong>${{$precio->precio}}</p>
                            <p><strong>Aceptado: {{ $precio->aceptado ? "Aceptado" : "Rechazado" }}</strong></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection