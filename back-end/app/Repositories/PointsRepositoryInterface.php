<?php

namespace App\Repositories;

interface PointsRepositoryInterface
{
	public function addPoints($userId, $points): void;
}
