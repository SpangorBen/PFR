<?php

namespace App\Repositories;

use App\DTO\ReviewDTO;

class ReviewRepository implements ReviewRepositoryInterface
{
	public function getReviewsForService($serviceId): Collection
	{
		return Review::where('service_id', $serviceId)->get();
	}

	public function find($id): ?Review
	{
		return Review::find($id);
	}

	public function create(ReviewDTO $reviewDTO)
	{
		return Review::create($reviewDTO->toArray());
	}

	public function update($id, ReviewDTO $reviewDTO)
	{
		$review = Review::findOrFail($id);
		$review->update($reviewDTO->toArray());
	}

	public function delete($id)
	{
		Review::findOrFail($id)->delete();
	}
}
