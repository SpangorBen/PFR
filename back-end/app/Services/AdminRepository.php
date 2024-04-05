<?php

namespace App\Services;
use App\Repositories\AdminRepositoryRepository;

class AdminRepository implements AdminRepositoryInterface
{
	protected $adminRepositoryRepository;

	public function __construct(AdminRepositoryRepository $adminRepositoryRepository){
		$this->adminRepositoryRepository = $adminRepositoryRepository;
	}
	// Implement your service logic here
}
