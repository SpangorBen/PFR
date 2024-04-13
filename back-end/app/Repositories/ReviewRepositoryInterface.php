<?php

namespace App\Repositories;

use App\DTO\ReviewDTO;

interface ReviewRepositoryInterface
{
    public function getReviewsForService($serviceId);

    public function find($id);

    public function create(ReviewDTO $reviewDTO);

    public function update($id, ReviewDTO $reviewDTO);

    public function delete($id);
}
