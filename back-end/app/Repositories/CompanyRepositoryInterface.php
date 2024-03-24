<?php

namespace App\Repositories;

interface CompanyRepositoryInterface
{
    public function addWorkerToCompany($companyId, $workerId);

    public function changeWorkerRoleToStaff($companyId, $workerId);

    public function acceptWorkerRequest($companyId, $workerId);

    public function updateCompany($companyId, array $data);

    public function getCompanyWorkers($companyId);
}