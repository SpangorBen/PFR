<?php

namespace App\Repositories;

use App\Models\User;

class PointsRepository implements PointsRepositoryInterface
{

	public function addPoints($userId, $points): void
	{
		$user = User::findOrFail($userId);
		$user->points += $points;
		$user->save();
	}

	public function subtractPoints($userId, $points): void
	{
		$user = User::findOrFail($userId);
		$user->points -= $points;
		$user->save();
	}

	public function getUserPoints($userId)
    {
        $user = User::find($userId);

        if ($user) {
            return $user->points;
        }

        return 0;
    }
}
