<?php

namespace App\Services;

use App\DTO\ReservationDTO;
use App\Events\ReservationCompleted;
use App\Repositories\ReservationRepositoryInterface;
use Illuminate\Support\Facades\Auth;

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

        $reservation->status = 'completed';
        $reservationDTO = ReservationDTO::fromModel($reservation);

        $this->reservationRepository->update($reservationId, $reservationDTO);

        event(new ReservationCompleted($reservationDTO));
    }

    public function fetchReservationsWorkerId()
    {
        $workerId = Auth::user()->id;
        return $this->reservationRepository->findByWorkerId($workerId);
    }

    public function acceptReservation($reservationId)
    {
        $this->reservationRepository->acceptReservation($reservationId);
    }

    public function rejectReservation($reservationId)
    {
        $this->reservationRepository->rejectReservation($reservationId);
    }

    public function getPoints(){
        $userId = Auth::user()->id;
        return $this->reservationRepository->getPoints($userId);
    }
}
