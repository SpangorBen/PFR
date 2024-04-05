<?php

namespace App\Http\Controllers;

use App\Services\ServiceServiceInterface;
use App\DTO\ServiceDTO;
use App\Http\Requests\CreateServiceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ServiceController extends Controller
{
    protected $serviceService;

    public function __construct(ServiceServiceInterface $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    // CRUD //
    public function index(): JsonResponse
    {
        $services = $this->serviceService->getAll();
        return response()->json($services);
    }

    public function show($id): JsonResponse
    {
        $service = $this->serviceService->find($id);
        return response()->json($service);
    }

    public function store(CreateServiceRequest $request): JsonResponse
    {
        if (Gate::denies('manage', Service::class)) {
            abort(403, 'Unauthorized');
        }

        $userId = Auth::id();
        $serviceDTO = ServiceDTO::fromRequest(array_merge($request->validated(), ['user_id' => $userId]));
        $service = $this->serviceService->create($serviceDTO);
        return response()->json(['message' => 'Service created successfully', 'data' => $service], 201);
    }

    public function update(CreateServiceRequest $request, $id): JsonResponse
    {
        if (Gate::denies('manage', Service::class)) {
            abort(403, 'Unauthorized');
        }

        $userId = Auth::id();
        $serviceDTO = ServiceDTO::fromRequest(array_merge($request->validated(), ['user_id' => $userId]));
        $service = $this->serviceService->update($id, $serviceDTO);
        return response()->json(['message' => 'Service updated successfully', 'data' => $service], 200);
    }

    public function destroy($id): JsonResponse
    {
        if (Gate::denies('manage', Service::class)) {
            abort(403, 'Unauthorized');
        }
        $this->serviceService->delete($id);
        return response()->json(204);
    }
    // CRUD //

    // SEARCH FILTER //

    public function search(Request $request): JsonResponse
    {
        $query = $request->input('query');
        if (empty($query)) {
            return response()->json(null, 404);
        }
        $searchResult = $this->serviceService->search($query);
        return response()->json($searchResult);
    }

    public function filterByCategory(Request $request): JsonResponse
    {
        $categoryId = $request->input('category_id');
        $filteredServices = $this->serviceService->filterByCategory($categoryId);
        return response()->json($filteredServices);
    }

    public function sortByPrice(Request $request): JsonResponse
    {
        $order = $request->input('order', 'asc');
        $sortedServices = $this->serviceService->sortByPrice($order);
        return response()->json($sortedServices);
    }
    // SEARCH FILTER //

}
