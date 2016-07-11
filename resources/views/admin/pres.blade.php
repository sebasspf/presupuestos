@extends('admin.layout')

@section('content')

    @include('components.header')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>Datos del presupuesto</h3>
                <table class="table">
                    <caption>Precios del presupuesto:</caption>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Falla</th>
                            <th>Precio</th>
                            <th>Días</th>
                            @if($presupuesto->estado->descripcion = "nuevo")
                                <th>Aceptado</th>
                            @endif
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($presupuesto->precios as $precio)
                            <tr>
                                <td>{{$precio->producto}}</td>
                                <td>{{$precio->falla}}</td>
                                <td>$ {{$precio->precio}}</td>
                                <td>{{$precio->tiempo}}</td>
                                @if($presupuesto->estado->descripcion = "nuevo")
                                    <td><span class="label" style="background-color:
                                    {{$precio->aceptado ? "#00AA00" : "#AA0000"}}">
                                    {{$precio->aceptado ? "Aceptado" : "Rechazado"}}</span></td>
                                @endif
                            </tr>
                        @endforeach    
                    </tbody>
                </table>

                @include('components.flash')

                <a href="/admin/presupuestos/{{$presupuesto->id}}/enviar" class="btn btn-default">
                Enviar presupuesto
                </a>
                
                <h3>Agregar precio:</h3><br>

                <form class="form-horizontal" method="POST" action="/admin/presupuestos/{{$presupuesto->id}}/precio">
                    <div class="form-group">
                        <label for="producto" class="col-sm-2 control-label">Producto:</label>
                        <div class="col-sm-10">
                            <input type="text" name="producto" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="falla" class="col-sm-2 control-label">Falla:</label>
                        <div class="col-sm-10">
                            <input type="text" name="falla" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="precio" class="col-md-4 control-label">Precio:</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">$</div>
                                        <input type="text" name="precio" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tiempo" class="col-md-4 control-label">Tiempo (días):</label>
                                <div class="col-md-8">
                                    <input type="text" name="tiempo" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button name="enviar" type="submit" class="btn btn-default">Guardar</button>
                        </div>
                    </div>

                </form>
                @include('components.errors')
            </div>
        </div>
    </div>