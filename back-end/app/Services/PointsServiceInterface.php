<?php

namespace App\Services;

use App\DTO\ReservationDTO;
use App\Models\Reservation;

interface PointsServiceInterface
{
	public function addPointsForReservation(ReservationDTO $reservationDTO): void;
}
