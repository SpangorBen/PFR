<?php

namespace App\Http\Controllers;

use App\Http\Requests\AwardRewardRequest;
use App\Http\Requests\RedeemRewardRequest;
use App\Services\RewardServiceInterface;
use Illuminate\Http\JsonResponse;

class RewardController extends Controller
{
    protected $rewardService;

    public function __construct(RewardServiceInterface $rewardService)
    {
        $this->rewardService = $rewardService;
    }

    public function getUserRewards($userId): JsonResponse
    {
        $rewards = $this->rewardService->getUserRewards($userId);
        return response()->json(['data' => $rewards]);
    }

    public function awardReward(AwardRewardRequest $request): JsonResponse
    {
        $reward = $this->rewardService->awardReward($request->validated());
        return response()->json(['message' => 'Reward awarded successfully', 'data' => $reward], 201);
    }

    public function redeemReward(RedeemRewardRequest $request): JsonResponse
    {
        $discount = $this->rewardService->redeemReward($request->validated());
        return response()->json(['message' => 'Reward redeemed successfully', 'discount_amount' => $discount]);
    }

    
}
