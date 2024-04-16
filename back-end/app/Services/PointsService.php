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
        // Retrieve the reservation details from the DTO
        $serviceId = $reservationDTO->service_id;
        $userId = $reservationDTO->user_id;

        // Fetch the service price from the service associated with the reservation
        $servicePrice = $this->serviceRepository->find($serviceId)->price;

        // Calculate the points earned based on the service price
        $points = $servicePrice / 10;

        // Add the points to the user's account
        $this->pointsRepository->addPoints($userId, $points);
    }

    public function subtractPointsForReservation(Reservation $reservation): void
    {
        $servicePrice = $reservation->service->price;

        $points = $servicePrice / 10;
        $userId = $reservation->user_id;
        $this->pointsRepository->subtractPoints($userId, $points);
    }
}
