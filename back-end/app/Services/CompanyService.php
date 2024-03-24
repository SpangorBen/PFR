<?php

namespace App\Services;

use App\Models\Company;
use App\Repositories\CompanyRepositoryInterface;
use App\Repositories\CompanyRequestRepositoryInterface;
use Illuminate\Support\Collection;

class CompanyService implements CompanyServiceInterface
{
    protected $companyRepository;
    protected $companyRequestRepository;

    public function __construct(
        CompanyRepositoryInterface $companyRepository,
        // CompanyRequestRepositoryInterface $companyRequestRepository
    ) {
        $this->companyRepository = $companyRepository;
        // $this->companyRequestRepository = $companyRequestRepository;
    }

    public function recruitWorker(Company $company, int $workerId): void
    {
        $this->companyRepository->addWorker($company, $workerId);
    }

    public function upgradeWorkerToStaff(Company $company, int $workerId): void
    {
        $this->companyRepository->upgradeWorkerToStaff($company, $workerId);
    }

    public function acceptNewWorker(Company $company, int $workerId): void
    {
        $this->companyRepository->acceptNewWorker($company, $workerId);
    }

    public function updateCompanyProfile(Company $company, array $data): Company
    {
        return $this->companyRepository->update($company->id, $data);
    }

    public function manageWorkers(Company $company)
    {
        return $this->companyRepository->getWorkers($company);
    }

    // public function sendRequestToStartCompany(int $userId): void
    // {
    //     $this->companyRequestRepository->createCompanyRequest($userId);
    // }
}
