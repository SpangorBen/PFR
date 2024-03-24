<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function addWorkerToCompany($companyId, $workerId)
    {
        $company = Company::findOrFail($companyId);
        $company->workers()->attach($workerId);
    }

    public function changeWorkerRoleToStaff($companyId, $workerId)
    {
        $company = Company::findOrFail($companyId);
        $role = Role::where('name', Role::STAFF)->firstOrFail();

        $worker = User::findOrFail($workerId);
        $worker->role()->associate($role);
        $worker->save();
    }

    public function acceptWorkerRequest($companyId, $workerId)
    {
        $company = Company::findOrFail($companyId);
        $company->workers()->attach($workerId);
    }

    public function updateCompany($companyId, array $data)
    {
        $company = Company::findOrFail($companyId);
        $company->update($data);
    }

    public function getCompanyWorkers($companyId)
    {
        return Company::findOrFail($companyId)->workers;
    }
}
