<?php

namespace App\Services;

use App\DTO\RewardDTO;
use App\Events\RewardRedeemed;
use App\Models\Reward;
use App\Repositories\PointsRepositoryInterface;
use App\Repositories\RewardRepositoryInterface;
use Illuminate\Support\Facades\Log;

class RewardService implements RewardServiceInterface
{
	protected $rewardRepository;
	protected $pointsRepository;

	public function __construct(RewardRepositoryInterface $rewardRepository, PointsRepositoryInterface $pointsRepository)
	{
		$this->rewardRepository = $rewardRepository;
		$this->pointsRepository = $pointsRepository;
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

	public function redeemReward($userId, $rewardId): ?string
	{
		$reward = $this->rewardRepository->find($rewardId);
		$rewardCost = $reward->cost;

		$userPoints = $this->pointsRepository->getUserPoints($userId);

		if ($userPoints < $rewardCost) {
			return 'Insufficient points';
		}

		if ($this->rewardRepository->userHasRedeemedRewardThisMonth($userId, $rewardId)) {
			return 'You have already redeemed this reward this month';
		}

		$code = $this->generateCode();

		if ($this->rewardRepository->associateCodeWithUser($userId, $rewardId, $code)) {
			event(new RewardRedeemed($userId, $rewardCost));
			return $code;
		}

		return null;
	}

	protected function generateCode()
	{
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

		for ($i = 0; $i < 5; $i++) {
			$code = '';
			for ($j = 0; $j < 8; $j++) {
				$code .= $characters[rand(0, strlen($characters) - 1)];
			}

			if (!$this->rewardRepository->codeExists($code)) {
				return $code;
			}
		}

		return null;
	}
}
