<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;

interface CompanyServiceInterface
{
    public function recruitWorker(Company $company, int $workerId): void;

    public function upgradeWorkerToStaff(Company $company, int $workerId): void;

    public function acceptNewWorker(Company $company, int $workerId): void;

    public function updateCompanyProfile(Company $company, array $data): Company;

    public function manageWorkers(Company $company);

    // public function sendRequestToStartCompany(int $userId): void;
}
