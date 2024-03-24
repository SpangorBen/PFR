<?php

namespace App\Http\Controllers;

use App\Services\CompanyServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyServiceInterface $companyService)
    {
        $this->companyService = $companyService;
    }

    public function recruitWorker(Request $request, $companyId): JsonResponse
    {
        $this->companyService->recruitWorker($companyId, $request->input('worker_id'));
        return response()->json(['message' => 'Worker recruited successfully']);
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

    public function updateCompanyProfile(Request $request, $companyId): JsonResponse
    {
        $company = $this->companyService->updateCompanyProfile($companyId, $request->all());
        return response()->json($company);
    }

    public function manageWorkers($companyId): JsonResponse
    {
        $workers = $this->companyService->manageWorkers($companyId);
        return response()->json($workers);
    }

    public function sendRequestToStartCompany(Request $request): JsonResponse
    {
        $this->companyService->sendRequestToStartCompany($request->input('user_id'));
        return response()->json(['message' => 'Request sent successfully']);
    }

    public function getServiceStatistics($companyId): JsonResponse
    {
        $statistics = $this->companyService->getServiceStatistics($companyId);
        return response()->json($statistics);
    }
}
