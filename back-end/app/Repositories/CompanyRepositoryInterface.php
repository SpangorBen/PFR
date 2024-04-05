<?php

namespace App\Repositories;

use App\DTO\CompanyDTO;

interface CompanyRepositoryInterface
{
    public function addWorkerToCompany($companyId, $workerId);

    public function changeWorkerRoleToStaff($companyId, $workerId);

    public function acceptWorkerRequest($companyId, $workerId);

    public function updateCompany($companyId, CompanyDTO $companyDTO);

    public function getCompanyWorkers($companyId);
}