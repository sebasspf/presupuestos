<?php

namespace App\Listeners;

use App\Events\PrecioCambiaEstado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class EnviarCorreoPrecio
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PrecioCambiaEstado  $event
     * @return void
     */
    public function handle(PrecioCambiaEstado $event)
    {
        $estado = $event->precio->estadoPrecio->descripcion;
        $precio = $event->precio;

        if($precio->estadoPrecio->email){
            $precio->load('presupuesto');
            Mail::send('emails.precio'.$estado, ['precio'=>$precio], function ($m) use ($precio) {
                $m->from('info@velpres.com', 'Sistema Velpres');
                $m->to($precio->presupuesto->cliente->email, $precio->presupuesto->cliente->nombre)
                    ->subject('Novedades en su presupuesto');
            });

        }

    }
}

