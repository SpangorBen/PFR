<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface CompanyRequestRepositoryInterface
{
    public function requestExistsForUser($userId): bool;

    public function createCompanyRequest($userId): void;

    public function acceptCompanyRequest($requestId): bool;

    public function declineCompanyRequest($requestId): bool;

    public function displayCompanyRequests(): Collection;
}
