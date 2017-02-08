@component('mail::message')
# Sistema Velpres

## Su nuevo presupuesto ya está disponible.

Detalles del presupuesto:

@foreach($presupuesto->precios->where('estado_id', 2) as $precio)

* Producto: {{$precio->producto}}
* Falla: {{$precio->falla}}
* Precio: ${{$precio->precio}}
* Tiempo: {{$precio->tiempo}} días

@endforeach

@if($presupuesto->precios->contains('estado_id', 5))
Lamentablemente no podemos presupuestar lo siguiente:

@foreach($presupuesto->precios->where('estado_id', 5) as $precio)
* Producto: {{$precio->producto}}
* Falla: {{$precio->falla}}
* Precio: ---
* Tiempo: ---
@endforeach

@endif
Puede aceptar o rechazar el presupuesto presionando el siguiente botón:
@component('mail::button', ['url' => 'http://presupuestos.app/presupuestos?clave='.$presupuesto->clave])
Acceder al presupuesto
@endcomponent

Muchas gracias por utilizar nuestros servicios, <br>
{{ config('app.name') }}
@endcomponent
