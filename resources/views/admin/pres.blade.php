@extends('admin.layout')

@section('content')

    @include('components.header')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table">
                    <caption>Precios del presupuesto</caption>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Falla</th>
                            <th>Precio</th>
                            <th>Días</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($presupuesto->precios as $precio)
                            <tr>
                                <td>{{$precio->producto}}</td>
                                <td>{{$precio->falla}}</td>
                                <td>$ {{$precio->precio}}</td>
                                <td>{{$precio->tiempo}}</td>
                                <td><span class="label" style="background-color:{{$precio->estadoPrecio->color}}">
                                    {{$precio->estadoPrecio->descripcion}}</span>
                                </td>
                                <td>
                                    <a href="/admin/precios/{{$precio->id}}" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach    
                    </tbody>
                </table>

                @include('components.flash')
                
                @if($presupuesto->estado->descripcion == "nuevo")
                    @if(!$presupuesto->precios->isEmpty())
                        <a href="/admin/presupuestos/{{$presupuesto->id}}/enviar" class="btn btn-default">
                            Enviar presupuesto
                        </a>
                    @endif
                    @include('admin.formPrecio')
                @endif

                @include('components.errors')
            </div>
        </div>
    </div>

@endsection