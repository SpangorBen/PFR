<?php

namespace App\Http\Controllers;

use App\DTO\CategoryDTO;
use App\Http\Requests\CreateCategoryRequest;
use App\Services\CategoryServiceInterface;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function store(CreateCategoryRequest $request): JsonResponse
    {
        $categoryDTO = CategoryDTO::fromRequest($request->validated());
        $category = $this->categoryService->createCategory($categoryDTO);

        return response()->json(['message' => 'Category created successfully', 'data' => $category], 201);
    }

    public function index(): JsonResponse
    {
        $categories = $this->categoryService->getAllCategories();

        return response()->json(['data' => $categories]);

    }
}
