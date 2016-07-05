@extends('emails.layout')

@section('content')

    <h1>Su nuevo presupuesto está disponible</h1>
    <p> Los precios son los siguientes:</p>

    @foreach($presupuesto->precios as $precio)
        
        <p><em>Producto:</em> {{$precio->producto}}</p>
        <p><em>Falla:</em> {{$precio->falla}}</p>
        <p><em>Precio:</em> {{$precio->precio}}</p>
        <p><em>Tiempo:</em> {{$precio->tiempo}}</p>    

    @endforeach

@endsection