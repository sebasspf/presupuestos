@extends('admin.layout')

@section('content')

    @include('components.header')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h4>Editando el presupuesto</h4>
                <form method="POST" action="/admin/presupuestos/{{$presupuesto->id}}" name="editPres">
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="comentario">Comentario:</label>
                        <input type="text" name="comentario" class="form-control" value="{{$presupuesto->comentario}}">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <select name="estado" class="form-control">
                            @foreach($estados as $estado)
                                <option value="{{$estado->id}}" {{$presupuesto->estado_id == $estado->id ? 'selected' : ''}}>
                                {{ucfirst($estado->descripcion)}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <button name="modificar" type="submit" class="btn btn-default">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection