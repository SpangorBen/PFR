<?php

namespace App\Services;

use App\DTO\ReservationDTO;
use App\Models\Reservation;
use App\Repositories\PointsRepositoryInterface;
use App\Repositories\ServiceRepositoryInterface;

class PointsService implements PointsServiceInterface
{
    protected $pointsRepository;
    protected $serviceRepository;

    public function __construct(PointsRepositoryInterface $pointsRepository, ServiceRepositoryInterface $serviceRepository)
    {
        $this->pointsRepository = $pointsRepository;
        $this->serviceRepository = $serviceRepository;
    }

    public function addPointsForReservation(ReservationDTO $reservationDTO): void
    {
        $serviceId = $reservationDTO->service_id;
        $userId = $reservationDTO->user_id;

        $servicePrice = $this->serviceRepository->find($serviceId)->price;
        $points = $servicePrice / 10;
        $this->pointsRepository->addPoints($userId, $points);
    }

    public function subtractPointsForReservation(ReservationDTO $reservation): void
    {
        // $servicePrice = $reservation->service->price;
        $serviceId = $reservationDTO->service_id;
        $userId = $reservationDTO->user_id;

        $servicePrice = $this->serviceRepository->find($serviceId)->price;
        $points = $servicePrice / 10;
        // $userId = $reservation->user_id;
        $this->pointsRepository->subtractPoints($userId, $points);
    }
}
