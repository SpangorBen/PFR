<?php

namespace App\Services;

use App\DTO\CategoryDTO;

interface CategoryServiceInterface
{
    public function createCategory(CategoryDTO $categoryDTO);
    public function getAllCategories();
}
