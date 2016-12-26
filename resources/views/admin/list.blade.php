@extends('admin.layout')

@section('head')
    <script src="/js/listpres.js"></script>
@endsection

@section('content')

    @include('components.header')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" id="main">
                <div class="row">
                    <div class="col-md-12" id="filter-bar">
                        <form class="form-inline" method="GET" name="busqueda" action="/admin/lista">
                            <div class="form-group">
                                <label for="tipopres">Filtrar por: </label>
                                <select class="form-control" id="tipopres" name="tipopres">
                                    <option value=0> - </option>
                                @foreach($estados as $estado)
                                    <option value="{{$estado->id}}" @if($estado->id == $tipopres) selected @endif>
                                        {{$estado->descripcion}}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Buscar</button>
                        </form>
                    </div>
                </div>
                @include('components.flash')
                <table class="table listado">
                {{ csrf_field() }}
                    <caption>Listado actual de presupuestos</caption>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Comentario</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($presupuestos as $pres)
                        <tr>
                            <th scope="row">{{ $pres->id }}</th>
                            <td>{{ $pres->created_at->format('d-m-Y') }}</td>
                            <td>{{ $pres->cliente == null ? 
                                $pres->datosPresupuesto->nombre : $pres->cliente->nombre
                            }}</td>
                            <td>{{ str_limit($pres->comentario, 43) }}</td>
                            <td><span class="label" style="background-color:{{$pres->estado->color}}">
                                    {{ ucfirst($pres->estado->descripcion)}}
                                </span></td> 
                            <td>      
                                <a href="/admin/presupuestos/{{$pres->id}}" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a type="button" href="" class="btn btn-default btn-sm" id="btn-remove-{{$pres->id}}">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $presupuestos->links() }}
            </div>
        </div>
    </div>

@endsection