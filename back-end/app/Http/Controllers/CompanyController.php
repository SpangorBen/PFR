<?php

namespace App\Http\Controllers;

use App\DTO\CompanyDTO;
use App\Http\Requests\CreateCompanyRequest;
use App\Services\CompanyServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyServiceInterface $companyService)
    {
        $this->companyService = $companyService;
    }

    public function store(CreateCompanyRequest $request): JsonResponse
    {
        $owner_id = Auth::id();
        $companyDTO = CompanyDTO::fromRequest(array_merge($request->validated(), ['owner_id' => $owner_id]));
        $company = $this->companyService->createCompany($companyDTO);
        return response()->json(['message' => 'Company created successfully', 'data' => $company], 201);
    }

    public function recruitWorker(Request $request, $companyId): JsonResponse
    {
        $request->validate([
            'worker' => 'required|exists:users,id'
        ]);

        $id = $request->input('worker');
        $this->companyService->recruitWorker($companyId, $id);
        return response()->json(['message' => 'Worker recruited successfully', 'data' => $id]);
    }

    public function upgradeWorkerToStaff($companyId, $workerId): JsonResponse
    {
        $this->companyService->upgradeWorkerToStaff($companyId, $workerId);
        return response()->json(['message' => 'Worker upgraded to staff successfully']);
    }

    public function acceptNewWorker($companyId, $workerId): JsonResponse
    {
        $this->companyService->acceptNewWorker($companyId, $workerId);
        return response()->json(['message' => 'New worker accepted successfully']);
    }

    public function updateCompanyProfile(CreateCompanyRequest $request, $companyId): JsonResponse
    {
        $owner_id = Auth::id();
        $companyDTO = CompanyDTO::fromRequest(array_merge($request->validated(), ['owner_id' => $owner_id]));
        $company = $this->companyService->updateCompanyProfile($companyId, $companyDTO);
        return response()->json(['message' => 'Company profile updated successfully', 'data' => $company]);
    }

    public function manageWorkers($companyId): JsonResponse
    {
        $workers = $this->companyService->manageWorkers($companyId);
        return response()->json($workers);
    }

    public function sendRequestToStartCompany(Request $request): JsonResponse
    {
        $userId = $request->input('user_id');

        $requestSent = $this->companyService->sendRequestToStartCompany($userId);
        if (!$requestSent) {
            return response()->json(['message' => 'Request already exists for the user.'], 400);
        }
        return response()->json(['message' => 'Request sent successfully']);
    }

    public function getServiceStatistics($companyId): JsonResponse
    {
        $statistics = $this->companyService->getServiceStatistics($companyId);
        return response()->json($statistics);
    }
}
