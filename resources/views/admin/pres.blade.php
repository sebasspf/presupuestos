@extends('admin.layout')

@section('content')

    @include('components.header')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h4>Detalles del presupuesto:</h4>
                <dl class="dl-horizontal">
                    <dt>Cliente:</dt>
                        <dd>{{$presupuesto->cliente == null ?
                            $presupuesto->datosPresupuesto->nombre : $presupuesto->cliente->nombre}}
                        </dd>
                    <dt>Email:</dt>
                        @if ($presupuesto->cliente)
                            <dd>{{$presupuesto->cliente->email}}</dd>
                        @else
                            <dd><strong>Presupuesto sin correo</strong></dd>
                        @endif
                    <dt>Descripicón:</dt>
                        <dd>{{$presupuesto->comentario}}</dd>
                    <dt>Fecha de creación:</dt>
                        <dd>{{$presupuesto->created_at->format('d-m-Y')}}</dd>
                    <dt>Estado:</dt>
                        <dd>
                            <span class="label" style="background-color:{{$presupuesto->estado->color}}">
                            {{ucfirst($presupuesto->estado->descripcion)}}</span>
                        </dd>
                    <dt>Modificar:</dt>
                        <dd><a href="/admin/presupuestos/{{$presupuesto->id}}/editar">Cambiar estado / detalles</a></dd>
                </dl>
            </div>
        </div>


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
                 @include('components.errors')

                 @if($presupuesto->estado->descripcion == "nuevo")
                     @include('admin.formPrecio')
                 @endif
            </div>
        </div>


        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h5 class="subtitulo">Acciones posibles</h5>
                <div class="row">
                    @if(!$presupuesto->precios->isEmpty() && isset($presupuesto->cliente)
                    && $presupuesto->estado->descripcion !== "finalizado")
                        <div class="col-md-2">
                            <a href="/admin/presupuestos/{{$presupuesto->id}}/enviar" class="btn btn-primary btn-block">
                                Enviar
                            </a>
                        </div>
                    @endif
                    <div class="col-md-2">
                        <form name="deletepres" method="POST" action="#">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <button name="borrar" type="submit" class="btn btn-danger btn-block">Borrar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <a href="/admin/presupuestos/{{$presupuesto->id}}/switch" class="btn btn-success btn-block">
                        {{$presupuesto->estado->descripcion == "finalizado" ? "Reabrir" : "Finalizar"}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection