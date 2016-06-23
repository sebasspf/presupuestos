@extends('admin.layout')

@section('content')

    @include('components.header');
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table">
                    <caption>Listado actual de presupuestos</caption>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Comentario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($presupuestos as $pres)
                        <tr>
                            <th scope="row">{{ $pres->id }}</th>
                            <td>{{ $pres->created_at->format('d - m - Y') }}</td>
                            <td>{{ $pres->cliente->nombre}}</td>
                            <td>{{ str_limit($pres->comentario, 55) }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $presupuestos->links() }}
            </div>
        </div>
    </div>

@endsection