<?php

namespace App\Services;
use App\DTO\CategoryDTO;
use App\Repositories\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
	protected $categoryRepository;

	public function __construct(CategoryRepositoryInterface $categoryRepository){
		$this->categoryRepository = $categoryRepository;
	}
    public function createCategory(CategoryDTO $categoryDTO)
    {
        return $this->categoryRepository->create($categoryDTO);
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->all();
    }}
