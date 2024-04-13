<?php

namespace App\Services;

use App\DTO\ReviewDTO;

interface ReviewServiceInterface
{
    public function getReviewsForService($serviceId);

    public function find($id);

	public function create(ReviewDTO $reviewDTO);

	public function update($id, ReviewDTO $reviewDTO): void;

    public function delete($id);
}
