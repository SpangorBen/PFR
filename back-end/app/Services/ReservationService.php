<?php

namespace App\Services;

use App\DTO\ReservationDTO;
use App\Events\ReservationCompleted;
use App\Repositories\ReservationRepositoryInterface;

class ReservationService implements ReservationServiceInterface
{
    protected $reservationRepository;

    public function __construct(ReservationRepositoryInterface $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function create(ReservationDTO $reservationDTO)
    {
        return $this->reservationRepository->create($reservationDTO);
    }

    public function update($id, ReservationDTO $reservationDTO)
    {
        $this->reservationRepository->update($id, $reservationDTO);
    }

    public function delete($id)
    {
        $this->reservationRepository->delete($id);
    }

    public function find($id)
    {
        return $this->reservationRepository->find($id);
    }

    public function findAll($userId)
    {
        return $this->reservationRepository->findAll($userId);
    }

    public function markReservationAsCompleted($reservationId)
    {
        $reservation = $this->reservationRepository->find($reservationId);

        $reservation->status = 'confirmed';
        $reservationDTO = ReservationDTO::fromModel($reservation);

        $this->reservationRepository->update($reservationId, $reservationDTO);

        event(new ReservationCompleted($reservationDTO));
    }
}
