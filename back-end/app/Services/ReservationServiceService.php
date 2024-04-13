<?php

namespace App\Services;

use App\DTO\ReservationDTO;

interface ReservationServiceInterface
{
    public function create(ReservationDTO $reservationDTO);

    public function update($id, ReservationDTO $reservationDTO);

    public function delete($id);

    public function find($id);

    public function findAll($userId);
}
