<?php

namespace App\Services;
use App\Repositories\RewardRepositoryInterface;

class RewardService implements RewardServiceInterface
{
	protected $rewardRepository;

	public function __construct(RewardRepositoryInterface $rewardRepository){
		$this->rewardRepository = $rewardRepository;
	}
	// Implement your service logic here
}
