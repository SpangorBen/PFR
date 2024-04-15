<?php

namespace App\Repositories;

class PointsRepository implements PointsRepositoryInterface
{

	public function addPoints($userId, $points): void
	{
		$user = User::findOrFail($userId);
		$user->points += $points;
		$user->save();
	}
}
