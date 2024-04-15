<?php

namespace App\Services;
use App\Repositories\PointsRepositoryInterface;

class PointsService implements PointsServiceInterface
{
	protected $pointsRepository;

	public function __construct(PointsRepositoryInterface $pointsRepository){
		$this->pointsRepository = $pointsRepository;
	}

	public function addPointsForReservation(Reservation $reservation): void
    {
        $servicePrice = $reservation->service->price;

        $points = $servicePrice / 10;
        $userId = $reservation->user_id;
        $this->pointsRepository->addPoints($userId, $points);
    }
}
