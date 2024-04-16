<?php

namespace App\Repositories;

use App\DTO\RewardDTO;
use App\Models\Reward;
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
}
