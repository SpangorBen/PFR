<?php

namespace App\Repositories;

use App\Models\CompanyRequest;
use Illuminate\Database\Eloquent\Collection;

class CompanyRequestRepository implements CompanyRequestRepositoryInterface
{
    public function requestExistsForUser($userId): bool
    {
        return CompanyRequest::where('user_id', $userId)->exists();
    }

    public function createCompanyRequest($userId): void
    {
        CompanyRequest::create([
            'user_id' => $userId,
        ]);
    }

    public function displayCompanyRequests(): Collection
    {
        $requests = CompanyRequest::all();
        return $requests;
    }

    // public function displayPendingRequests()

    public function acceptCompanyRequest($requestId): bool
    {
        $request = CompanyRequest::findOrFail($requestId);
        if ($request->status === 'pending') {
            $request->update([
                'status' => 'accepted',
            ]);
            return true;
        } else {
            return false;
        }
    }

    public function declineCompanyRequest($requestId): bool
    {
        $request = CompanyRequest::findOrFail($requestId);
        if ($request->status === 'pending') {
            $request->update([
                'status' => 'rejected',
            ]);
            return true;
        } else {
            return false;
        }
    }
}
