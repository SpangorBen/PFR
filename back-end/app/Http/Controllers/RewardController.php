<?php

namespace App\Http\Controllers;

use App\DTO\RewardDTO;
use App\Http\Requests\CreateRewardRequest;
use App\Services\RewardService;
use Illuminate\Http\JsonResponse;

class RewardController extends Controller
{
    protected $rewardService;

    public function __construct(RewardService $rewardService)
    {
        $this->rewardService = $rewardService;
    }

    public function index(): JsonResponse
    {
        $rewards = $this->rewardService->getAllRewards();
        return response()->json(['data' => $rewards]);
    }

    public function show($id): JsonResponse
    {
        $reward = $this->rewardService->getRewardById($id);
        return response()->json(['data' => $reward]);
    }

    public function store(CreateRewardRequest $request): JsonResponse
    {
        $rewardDTO = RewardDTO::fromRequest($request->validated());
        $reward = $this->rewardService->createReward($rewardDTO);
        if (is_string($reward)) {
            return response()->json(['error' => $reward], 500);
        }
        return response()->json(['message' => 'Reward created successfully', 'data' => $reward], 201);
    }

    public function update(CreateRewardRequest $request, $id): JsonResponse
    {
        $rewardDTO = RewardDTO::fromRequest($request->validated());
        $this->rewardService->updateReward($id, $rewardDTO);

        return response()->json(['message' => 'Reward updated successfully']);
    }

    public function destroy($id): JsonResponse
    {
        $this->rewardService->deleteReward($id);

        return response()->json(['message' => 'Reward deleted successfully']);
    }
}
