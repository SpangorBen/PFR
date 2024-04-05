<?php

namespace App\Http\Controllers;

use App\Services\AdminServiceInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(AdminServiceInterface $adminService)
    {
        $this->adminService = $adminService;
    }

    public function displayCompanyrequest()
    {
        $requests = $this->adminService->displayCompanyRequests();
        return response()->json(["message" => "All Company requests", "data" => $requests]);
    }

    public function acceptCompanyRequest($requestId)
    {
        if ($this->adminService->acceptCompanyRequest($requestId)) {
            return response()->json(["message" => "Company accepted"]);
        } else {
            return response()->json(["message" => "You alerady took action for this request"]);
        }
    }

    public function declineCompanyRequest($requestId)
    {
        if ($this->adminService->declineCompanyRequest($requestId)) {
            return response()->json(["message" => "Company rejected"]);
        } else {
            return response()->json(["message" => "You alerady took action for this request"]);
        }
    }
}
