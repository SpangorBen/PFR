<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

interface AdminServiceInterface
{
    public function displayCompanyRequests(): Collection;

    public function acceptCompanyRequest($requestId): bool;

    public function declineCompanyRequest($requestId): bool;

    // public function getUsers(): Collection;

    // public function getUsersByCompany(int $companyId): Collection;

    // public function banUser(int $userId): void;
}
