<?php

namespace App\Repositories;

use App\Models\CompanyRequest;
use App\Models\User;

class EloquentAdminRepository implements AdminRepositoryInterface
{
    public function getCompanyRequests()
    {
        return CompanyRequest::all();
    }

    public function acceptCompanyRequest($requestId)
    {
        $request = CompanyRequest::findOrFail($requestId);
        $request->update(['status' => 'accepted']);
    }

    public function getUsers()
    {
        return User::all();
    }

    public function getUsersByCompany()
    {
    }

    public function banUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->update(['banned' => true]);
    }
}
