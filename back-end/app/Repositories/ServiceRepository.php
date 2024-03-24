<?php

namespace App\Repositories;

use App\DTO\ServiceDTO;
use App\Models\Service;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function getAll()
    {
        return Service::all();
    }

    public function find($id)
    {
        return Service::find($id);
    }

    public function create(ServiceDTO $serviceDTO)
    {
        return Service::create($serviceDTO->toArray());
    }

    public function update($id, ServiceDTO $serviceDTO)
    {
        $service = Service::findOrFail($id);
        $service->update($serviceDTO->toArray());
        return $service;
    }

    public function delete($id)
    {
        $service = Service::find($id);

        if ($service) {
            $service->delete();
        }
    }

    public function assignToWorker(Service $service, $workerId)
    {
        $service->workers()->attach($workerId);
    }

    public function removeFromWorker(Service $service, $workerId)
    {
        $service->workers()->detach($workerId);
    }
}
