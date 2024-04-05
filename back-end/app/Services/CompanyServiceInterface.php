<?php

namespace App\Services;

use App\DTO\CompanyDTO;
use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;

interface CompanyServiceInterface
{
    public function recruitWorker(Company $company, $workerId): void;

    public function upgradeWorkerToStaff(Company $company, $workerId): void;

    public function acceptNewWorker(Company $company, $workerId): void;

    public function updateCompanyProfile($companyId, CompanyDTO $companyDTO): Company;

    public function manageWorkers(Company $company);

    public function sendRequestToStartCompany($userId): bool;
}
