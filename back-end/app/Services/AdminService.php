<?php

namespace App\Services;

use App\Repositories\CompanyRequestRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AdminService implements AdminServiceInterface
{
	protected $companyRequestRepository;
    protected $userRepository;

    public function __construct(
        CompanyRequestRepositoryInterface $companyRequestRepository,
        // UserRepositoryInterface $userRepository
    ) {
        $this->companyRequestRepository = $companyRequestRepository;
        // $this->userRepository = $userRepository;
    }

	public function displayCompanyRequests(): Collection
	{
		$requests = $this->companyRequestRepository->displayCompanyRequests();
		return $requests;
	}

    public function acceptCompanyRequest($requestId): bool
    {
        if ($this->companyRequestRepository->acceptCompanyRequest($requestId)){
			return true;
		} else {
			return false;
		}
    }

	public function declineCompanyRequest($requestId): bool
	{
		if ($this->companyRequestRepository->declineCompanyRequest($requestId)){
			return true;
		} else {
			return false;
		}
    }


    // public function getUsers(): Collection
    // {
    //     return $this->userRepository->getAllUsers();
    // }

    // public function getUsersByCompany(int $companyId): Collection
    // {
    //     return $this->userRepository->getUsersByCompany($companyId);
    // }

    // public function banUser(int $userId): void
    // {
    //     $this->userRepository->banUser($userId);
    // }
}
