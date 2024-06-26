<?php

namespace App\Services;

use App\DTO\CompanyDTO;
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
        CompanyRequestRepositoryInterface $companyRequestRepository
    ) {
        $this->companyRepository = $companyRepository;
        $this->companyRequestRepository = $companyRequestRepository;
    }

    public function createCompany(CompanyDTO $companyDTO)
    {
        // if ($companyDTO->owner_id === null) {
        //     return null;
        // }
        // if ($this->companyRepository->companyExists($companyDTO->name)) {
        //     return null;
        // } else {
        //     return $this->companyRepository->create($companyDTO);
        // }
        return $this->companyRepository->create($companyDTO);
    }

    public function recruitWorker($companyId, $workerId): void
    {
        $this->companyRepository->addWorkerToCompany($companyId, $workerId);
    }

    public function upgradeWorkerToStaff($companyId, $workerId): void
    {
        $this->companyRepository->changeWorkerRoleToStaff($companyId, $workerId);
    }

    public function acceptNewWorker($companyId, $workerId): void
    {
        $this->companyRepository->changeWorkerRoleToStaff($companyId, $workerId);
    }

    public function updateCompanyProfile($companyId, CompanyDTO $companyDTO): Company
    {
        return $this->companyRepository->updateCompany($companyId, $companyDTO);
    }

    public function manageWorkers($companyId)
    {
        return $this->companyRepository->getCompanyWorkers($companyId);
    }

    public function sendRequestToStartCompany($userId): bool
    {
        if ($this->companyRequestRepository->requestExistsForUser($userId)) {
            return false;
        }

        $this->companyRequestRepository->createCompanyRequest($userId);
        return true;
    }

    public function getServiceStatistics($companyId)
    {
        $services = $this->companyRepository->getServicesByCompanyId($companyId);

        $averagePrice = $services->avg('price');
        $totalServices = $services->count();

        return [
            'average_price' => $averagePrice,
            'total_services' => $totalServices,
        ];
    }
}
