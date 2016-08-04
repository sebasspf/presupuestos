@extends('admin.layout')

@section('content')

    @include('components.header')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>Detalles del arreglo:</h3>
                <dl class="dl-horizontal">
                    <dt>Producto</dt>
                        <dd>{{$precio->producto}}</dd>
                    <dt>Falla</dt>
                        <dd>{{$precio->falla}}</dd>
                    <dt>Precio</dt>
                        <dd>${{$precio->precio}}</dd>
                    <dt>Tiempo</dt>
                        <dd>{{$precio->tiempo}} días</dd>
                    <dt>Estado</dt>
                    <dd>{{$precio->estadoPrecio->descripcion}}</dd>
                </dl>
                <h3>Cambiar estado:</h3><br>

                <form action="#" class="form-inline" method="POST">

                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <select name="estado" class="form-control">
                            @foreach ($estados as $estado)
                                <option value="{{$estado->id}}" {{$precio->estado_id == $estado->id ? 'selected':''}}>
                                    {{$estado->descripcion}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <button name="modificar" type="submit" class="btn btn-default">Modificar</button>
                    </div>
                </form>
                <br>
                @include('components.errors')
                @include('components.flash')
            </div>
        </div>
    </div>

@endsection