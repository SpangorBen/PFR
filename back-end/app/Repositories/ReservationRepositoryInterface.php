<?php

namespace App\Repositories;

use App\DTO\ReservationDTO;

interface ReservationRepositoryInterface
{
    public function create(ReservationDTO $reservationDTO);

    public function update($id, ReservationDTO $reservationDTO);

    public function delete($id);

    public function find($id);

    public function findAll($userId);
    
    // public function getReservationsByServiceId($serviceId);

    // public function getReservationsByUserId($userId);
}
