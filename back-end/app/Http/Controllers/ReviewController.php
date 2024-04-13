<?php

namespace App\Http\Controllers;

use App\Services\ReviewServiceInterface;
use App\DTO\ReviewDTO;
use App\Http\Requests\CreateReviewRequest;
use Illuminate\Http\JsonResponse;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewServiceInterface $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function getReviewsForService($serviceId): JsonResponse
    {
        $reviews = $this->reviewService->getReviewsForService($serviceId);
        return response()->json(['data' => $reviews]);
    }

    public function show($id): JsonResponse
    {
        $review = $this->reviewService->find($id);
        return response()->json(['data' => $review]);
    }

    public function store(CreateReviewRequest $request): JsonResponse
    {
        $reviewDTO = ReviewDTO::fromRequest($request->validated());
        $review = $this->reviewService->create($reviewDTO);
        return response()->json(['message' => 'Review created successfully', 'data' => $review], 201);
    }

    public function update(CreateReviewRequest $request, $id): JsonResponse
    {
        $reviewDTO = ReviewDTO::fromRequest($request->validated());
        $this->reviewService->update($id, $reviewDTO);
        return response()->json(['message' => 'Review updated successfully']);
    }

    public function destroy($id): JsonResponse
    {
        $this->reviewService->delete($id);
        return response()->json(['message' => 'Review deleted successfully']);
    }
}
