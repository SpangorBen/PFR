<?php

namespace App\Http\Controllers;

use App\DTO\ReservationDTO;
use App\Http\Requests\CreateReservationRequest;
use App\Services\ReservationServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    protected $reservationService;

    public function __construct(ReservationServiceInterface $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    public function create(CreateReservationRequest $request): JsonResponse
    {
        $userId = auth()->user()->id;
        $reservationDTO = ReservationDTO::fromRequest($request->validated(), $userId);
        $reservation = $this->reservationService->create($reservationDTO);
        
        return response()->json(['message' => 'Reservation created successfully', 'data' => $reservation], 201);
    }

    public function update(CreateReservationRequest $request, $id): JsonResponse
    {
        $userId = $request->user()->id;
        $reservationDTO = ReservationDTO::fromRequest($request->validated(), $userId);
        $this->reservationService->update($id, $reservationDTO);
        
        return response()->json(['message' => 'Reservation updated successfully']);
    }

    public function delete($id): JsonResponse
    {
        $this->reservationService->delete($id);
        
        return response()->json(['message' => 'Reservation deleted successfully']);
    }

    public function show($id): JsonResponse
    {
        $reservation = $this->reservationService->find($id);
        
        return response()->json(['data' => $reservation]);
    }

    public function index(Request $request): JsonResponse
    {
        $userId = $request->user()->id;
        $reservations = $this->reservationService->findAll($userId);
        
        return response()->json(['data' => $reservations]);
    }

    public function markAsCompleted($id): JsonResponse
    {
        try {
            $this->reservationService->markReservationAsCompleted($id);
            return response()->json(['message' => 'Reservation marked as completed successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to mark reservation as completed', 'error' => $e->getMessage()], 500);
        }
    }
}
