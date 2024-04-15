<?php

namespace App\Services;

interface PointsServiceInterface
{
	public function addPointsForReservation(Reservation $reservation): void;
}
