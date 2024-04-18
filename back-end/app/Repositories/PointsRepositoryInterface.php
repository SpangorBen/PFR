<?php

namespace App\Repositories;

interface PointsRepositoryInterface
{
	public function addPoints($userId, $points): void;
	public function subtractPoints($userId, $points): void;
	public function getUserPoints($userId);
}
