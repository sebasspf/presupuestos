<?php

namespace App\Events;

use App\Events\Event;
use App\Precio;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PrecioCambiaEstado extends Event
{
    use SerializesModels;
    public $precio;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Precio $precio)
    {
        $this->precio = $precio;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
