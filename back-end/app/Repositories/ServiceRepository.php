<?php

namespace App\Repositories;

use App\DTO\ServiceDTO;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function getAll($userId)
    {
        return Service::where('user_id', $userId)->get();
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

        if ($service && $service->user_id === Auth::user()->id) {
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
