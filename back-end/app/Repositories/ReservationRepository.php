<?php

namespace App\Repositories;

use App\DTO\ReservationDTO;
use App\Models\Reservation;

class ReservationRepository implements ReservationRepositoryInterface
{
    public function create(ReservationDTO $reservationDTO)
    {
        return Reservation::create($reservationDTO->toArray());
    }

    public function update($id, ReservationDTO $reservationDTO)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update($reservationDTO->toArray());
    }

    public function delete($id)
    {
        Reservation::findOrFail($id)->delete();
    }

    public function find($id)
    {
        return Reservation::findOrFail($id);
    }

    public function findAll($userId)
    {
        return Reservation::where('user_id', $userId)->get();
    }
}
