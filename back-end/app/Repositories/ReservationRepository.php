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

    public function findByWorkerId($workerId)
    {
//        return Reservation::whereHas('service', function ($query) use ($workerId) {
//            $query->where('user_id', $workerId);
//        })->get();

        return Reservation::whereHas('service', function ($query) use ($workerId) {
            $query->where('user_id', $workerId)
                ->with('category');
        })->with(['service' => function ($query) {
            $query->select('id', 'name');
        }, 'user:id,name'])
        ->get();
    }

    public function acceptReservation($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);

        if ($reservation->status === 'pending') {
            $reservation->update(['status' => 'confirmed']);
        } else {
            throw new \Exception('This reservation is not pending, so it cannot be accepted');
        }
    }

    public function rejectReservation($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);

        if ($reservation->status === 'pending') {
            $reservation->update(['status' => 'cancelled']);
        } else {
            throw new \Exception('This reservation is not pending, so it cannot be rejected');
        }
    }
}
