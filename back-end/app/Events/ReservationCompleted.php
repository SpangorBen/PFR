<?php

namespace App\Events;

use App\DTO\ReservationDTO;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReservationCompleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reservationDTO;

    /**
     * Create a new event instance.
     */
    public function __construct(ReservationDTO $reservationDTO)
    {
        $this->reservationDTO = $reservationDTO;
    }
}
