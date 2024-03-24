<?php

namespace App\Repositories;

use App\DTO\ServiceDTO;
use App\Models\Service;

interface ServiceRepositoryInterface
{
    public function getAll();

    public function find($id);

    public function create(ServiceDTO $serviceDTO);

    public function update($id, ServiceDTO $serviceDTO);

    public function delete($id);

    public function assignToWorker(Service $service, $workerId);

    public function removeFromWorker(Service $service, $workerId);
}
