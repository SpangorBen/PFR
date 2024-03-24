<?php

namespace App\Services;

use App\DTO\ServiceDTO;
use App\Models\Service;

interface ServiceServiceInterface
{
    public function create(ServiceDTO $serviceDTO);

    public function update($id, ServiceDTO $serviceDTO);

    public function delete($id);

    public function getAll();

    public function find($id);

    public function assignToWorker(Service $service, $workerId);

    public function removeFromWorker(Service $service, $workerId);

}
