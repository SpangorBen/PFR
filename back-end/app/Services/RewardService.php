<?php

namespace App\Services;

use App\DTO\RewardDTO;
use App\Models\Reward;
use App\Repositories\RewardRepositoryInterface;
use Illuminate\Support\Facades\Log;

class RewardService implements RewardServiceInterface
{
	protected $rewardRepository;

	public function __construct(RewardRepositoryInterface $rewardRepository)
	{
		$this->rewardRepository = $rewardRepository;
	}

	public function getAllRewards()
	{
		return $this->rewardRepository->getAll();
	}

	public function getRewardById($id)
	{
		return $this->rewardRepository->find($id);
	}

	public function createReward(RewardDTO $rewardDTO)
	{
		try {
			return Reward::create($rewardDTO->toArray());
		} catch (Exception $e) {
			return 'Error while creating a new reward: ' . $e->getMessage();
		}
	}

	public function updateReward($id, RewardDTO $rewardDTO)
	{
		return $this->rewardRepository->update($id, $rewardDTO);
	}

	public function deleteReward($id)
	{
		$this->rewardRepository->delete($id);
	}
}
