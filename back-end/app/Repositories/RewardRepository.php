<?php

namespace App\Repositories;

use App\DTO\RewardDTO;
use App\Models\Reward;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

class RewardRepository implements RewardRepositoryInterface
{
    public function getAll()
    {
        try {
            return Reward::all();
        } catch (Exception $e) {
            Log::error('Error while retrieving all rewards: ' . $e->getMessage());
            return [];
        }
    }

    public function find($id)
    {
        try {
            return Reward::findOrFail($id);
        } catch (Exception $e) {
            Log::error('Error while finding reward with ID ' . $id . ': ' . $e->getMessage());
            return null;
        }
    }

    public function create(RewardDTO $rewardDTO)
    {
        try {
            return Reward::create($rewardDTO->toArray());
        } catch (Exception $e) {
            Log::error('Error while creating a new reward: ' . $e->getMessage());
            return null;
        }
    }

    public function update($id, RewardDTO $rewardDTO)
    {
        try {
            $reward = Reward::findOrFail($id);
            $reward->update($rewardDTO->toArray());
            return $reward;
        } catch (Exception $e) {
            Log::error('Error while updating reward with ID ' . $id . ': ' . $e->getMessage());
            return null;
        }
    }

    public function delete($id)
    {
        try {
            $reward = Reward::find($id);
            if ($reward) {
                $reward->delete();
            }
        } catch (Exception $e) {
            Log::error('Error while deleting reward with ID ' . $id . ': ' . $e->getMessage());
        }
    }

    public function associateCodeWithUser($userId, $rewardId, $code)
    {
        $user = User::find($userId);
        if ($this->userHasRedeemedRewardThisMonth($userId, $rewardId) || $this->codeExists($code)) {
            return null;
        }
        $user->rewards()->attach($rewardId, ['code' => $code]);
        return $code;
    }

    public function codeExists($code)
    {
        return User::whereHas('rewards', function ($query) use ($code) {
            $query->where('user_reward.code', $code);
        })->exists();
    }

    public function userHasRedeemedRewardThisMonth($userId, $rewardId)
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        return User::where('id', $userId)
            ->whereHas('rewards', function ($query) use ($rewardId, $startOfMonth, $endOfMonth) {
                $query->where('rewards.id', $rewardId)
                    ->whereBetween('user_reward.created_at', [$startOfMonth, $endOfMonth]);
            })->exists();
    }

    

    // public function getRedeemedRewards($userId)
    // {
    //     return User::find($userId)->rewards()->whereNotNull('user_reward.code')->get();
    // }
}
