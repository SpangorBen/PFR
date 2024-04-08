<?php

namespace App\Services;

use App\DTO\ServiceDTO;
use App\Models\Service;
use App\Repositories\ServiceRepositoryInterface;

class ServiceService implements ServiceServiceInterface
{
    protected $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function create(ServiceDTO $serviceDTO)
    {
        return $this->serviceRepository->create($serviceDTO);
    }

    public function update($id, ServiceDTO $serviceDTO)
    {
        return $this->serviceRepository->update($id, $serviceDTO);
    }

    public function delete($id)
    {
        $this->serviceRepository->delete($id);
    }

    public function getAll()
    {
        return $this->serviceRepository->getAll();
    }

    public function find($id)
    {
        return $this->serviceRepository->find($id);
    }

    public function assignToWorker(Service $service, $workerId)
    {
        $this->serviceRepository->assignToWorker($service, $workerId);
    }

    public function removeFromWorker(Service $service, $workerId)
    {
        $this->serviceRepository->removeFromWorker($service, $workerId);
    }

    public function search(string $query)
    {
        return Service::where('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();
    }

    public function filterByCategory(int $categoryId)
    {
        return Service::where('category_id', $categoryId)
            ->get();
    }

    public function sortByPrice(string $order = 'asc')
    {
        return Service::orderBy('price', $order)
            ->get();
    }

    // public function getWorkers(Service $service)
    // {
    //     return $service->workers;
    // }

    // public function getReservations(Service $service)
    // {
    //     return $service->reservations;
    // }

    // public function getCompany(Service $service)
    // {
    //     return $service->company;
    // }
}
