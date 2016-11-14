@extends('admin.layout')


@section('head')

<script type="text/javascript" src="/js/addForm.js"></script>
<link rel="stylesheet" href="/css/estilos.css">

@endsection


@section('content')

    @include('components.header')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="tituloAddForm">Presupuesto nuevo</h3>
                <form method="POST" action="/admin/presupuesto">
                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" placeholder="correo@example.com"
                            value="{{old('email')}}" >
                            <div class="input-group-addon"><a href="#" name="veriflink">Verificar</a></div>
                            <div class="input-group-addon"><a href="#" name="emaillink">Sin email</a></div>
                        </div>
                    </div>
                    <div name ='ntfExito' class='alert alert-success hidden' role='alert'>Cliente existente</div>
                    <div name ='ntfNuevo' class='alert alert-info hidden' role='alert'>Cliente Nuevo</div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="comentario">Comentario:</label>
                        <textarea name="comentario" class="form-control">{{old('comentario')}}</textarea>
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <button name="enviar" type="submit" class="btn btn-default">Guardar</button>
                    </div>  
                </form>
                @include('components.flash')
                @include('components.errors')
            </div>
        </div>
    </div>
@endsection