<?php

namespace App\DTO;

class ReservationDTO
{
    public $user_id;
    public $service_id;
    public $status;

    public function __construct($user_id, $service_id, $status)
    {
        $this->user_id = $user_id;
        $this->service_id = $service_id;
        $this->status = $status;
    }

    public static function fromRequest(array $data, $userId)
    {
        return new self(
            $userId,
            $data['service_id'],
            $data['status']
        );
    }
}