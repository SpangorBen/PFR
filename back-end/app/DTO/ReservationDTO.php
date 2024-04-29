<?php

namespace App\DTO;

use App\Models\Reservation;

class ReservationDTO
{
    public $user_id;
    public $service_id;
    public $status;
    public $date;

    public function __construct($user_id, $service_id, $status, $date)
    {
        $this->user_id = $user_id;
        $this->service_id = $service_id;
        $this->status = $status;
        $this->date = $date;
    }

    public static function fromRequest(array $data, $userId)
    {
        return new self(
            $userId,
            $data['service_id'],
            $data['status'],
            $data['date']
        );
    }

    public static function fromModel(Reservation $reservation): self
    {
        return new self(
            $reservation->user_id,
            $reservation->service_id,
            $reservation->status,
            $reservation->date,
        );
    }

    public function toArray()
    {
        return [
            'user_id' => $this->user_id,
            'service_id' => $this->service_id,
            'status' => $this->status,
            'date' => $this->date,
        ];
    }
}
