<?php

namespace App\Services;

use App\DTO\ReviewDTO;
use App\Models\Review;
use Illuminate\Support\Collection;
use App\Repositories\ReviewRepositoryInterface;

class ReviewService implements ReviewServiceInterface
{
	protected $reviewRepository;

	public function __construct(ReviewRepositoryInterface $reviewRepository)
	{
		$this->reviewRepository = $reviewRepository;
	}

	public function getReviewsForService($serviceId): Collection
	{
		return $this->reviewRepository->getReviewsForService($serviceId);
	}

	public function find($id): ?Review
	{
		return $this->reviewRepository->find($id);
	}

	public function create(ReviewDTO $reviewDTO)
	{
		return $this->reviewRepository->create($reviewDTO);
	}

	public function update($id, ReviewDTO $reviewDTO): void
	{
		$this->reviewRepository->update($id, $reviewDTO);
	}

	public function delete($id): void
	{
		$this->reviewRepository->delete($id);
	}
}
