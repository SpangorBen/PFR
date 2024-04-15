<?php

namespace App\Http\Controllers;

use App\Services\RewardServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function awardReward(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'reservation_count' => 'required|integer|min:0',
            'discount_amount' => 'required|numeric|min:0',
        ]);

        $reward = $this->rewardService->awardReward($validatedData);
        return response()->json(['message' => 'Reward awarded successfully', 'data' => $reward], 201);
    }

    public function redeemReward(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'reservation_count' => 'required|integer|min:0',
        ]);

        $discount = $this->rewardService->redeemReward($validatedData);
        return response()->json(['message' => 'Reward redeemed successfully', 'discount_amount' => $discount]);
    }
}
