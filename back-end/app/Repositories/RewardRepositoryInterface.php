<?php

namespace App\Repositories;

use App\DTO\RewardDTO;
use App\Models\Reward;

interface RewardRepositoryInterface
{
        public function getAll();
        public function find($id);
        public function create(RewardDTO $rewardDTO);
    public function update($id, RewardDTO $rewardDTO);
    public function delete($id);
    public function associateCodeWithUser(User $user, Reward $reward, $code);
    public function codeExists($code);
}
