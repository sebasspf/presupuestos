@extends('admin.layout')

@section('head')

    <script src="https://code.jquery.com/jquery-3.0.0.min.js" integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>
    <script src="/js/addForm.js"></script>

@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>Presupuesto nuevo</h3>
                <form method="POST" action="/admin/presupuesto">
                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        
                        <input type="email" name="email" class="form-control"
                         placeholder="correo@example.com" required >
                    </div>
                    <div name ='ntfExito' class='alert alert-success hidden' role='alert'>Cliente existente</div>
                    <div name ='ntfNuevo' class='alert alert-info hidden' role='alert'>Cliente Nuevo</div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label for="comentario">Comentario:</label>
                        <textarea name="comentario" class="form-control" disabled></textarea>
                    </div>
                    <input type="hidden" name="cliente_id" value="0">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <button name="enviar" type="submit" class="btn btn-default" disabled>Guardar</button>
                    </div>
                </form>
                @include('components.flash')
            </div>
        </div>
    </div>
@endsection