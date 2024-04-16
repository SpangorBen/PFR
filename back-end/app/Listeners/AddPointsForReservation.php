<?php

namespace App\Listeners;

use App\Events\ReservationCompleted;
use App\Services\PointsServiceInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddPointsForReservation
{
    /**
     * Create the event listener.
     */
    public function __construct(PointsServiceInterface $pointsService)
    {
        $this->pointsService = $pointsService;
    }

    /**
     * Handle the event.
     */
    public function handle(ReservationCompleted $event): void
    {
        $reservationDTO = $event->reservationDTO;
        $this->pointsService->addPointsForReservation($reservationDTO);
    }
}
