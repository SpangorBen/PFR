<?php

namespace App\Repositories;

use App\DTO\CompanyDTO;
use App\Models\Company;
use App\Models\Role;
use App\Models\User;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function create(CompanyDTO $companyDTO)
    {
        return Company::create($companyDTO->toArray());
    }

    public function addWorkerToCompany($companyId, $workerId)
    {
        $company = Company::findOrFail($companyId);
        $user = User::findOrFail($workerId);
        $user->update([
            'company_id' => $company->id
        ]);
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
        $user = User::findOrFail($workerId);
        $user->update([
            'company_id' => $company->id
        ]);
    }

    public function updateCompany($companyId, CompanyDTO $companyDTO)
    {
        $company = Company::findOrFail($companyId);
        $company->update($companyDTO->toArray());
        return $company;
    }

    public function getCompanyWorkers($companyId)
    {
        return Company::findOrFail($companyId)->workers;
    }
    
}
