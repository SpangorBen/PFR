<?php

namespace App\Repositories;

use App\DTO\ServiceDTO;
use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function all()
    {
        return Service::with('category')->get();
    }
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

    public function getServiceStatistics($userId)
    {
        $totalServices = Service::where('user_id', $userId)->count();
        $averagePrice = Service::where('user_id', $userId)->avg('price');
        $mostExpensiveService = Service::where('user_id', $userId)->orderByDesc('price')->first();
        $totalReservations = Reservation::whereHas('service', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();
        $totalPendingReservations = Reservation::whereHas('service', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('status', 'pending')->count();
        $totalCompletedReservations = Reservation::whereHas('service', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('status', 'completed')->count();
        $services = Service::where('user_id', $userId)->withCount('reviews')->get();
        $totalReviews = $services->sum('reviews_count');
        $averageRating = $totalReviews > 0 ? Service::where('user_id', $userId)->avg('rating') : 0;
        $reservationCompletionRate = $totalReservations > 0 ? ($totalCompletedReservations / $totalReservations) * 100 : 0;


        return [
            'total_services' => $totalServices,
            'average_price' => $averagePrice,
            'most_expensive_service' => $mostExpensiveService,
            'total_reservations' => $totalReservations,
            'total_pending_reservations' => $totalPendingReservations,
            'completed_reservations_ratio' => round($reservationCompletionRate, 2),
            'total_reviews' => $totalReviews,
            'average_rating' => $averageRating,
        ];
    }
}
