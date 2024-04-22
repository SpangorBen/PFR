<?php

namespace App\Repositories;

use App\DTO\CategoryDTO;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function create(CategoryDTO $categoryDTO)
    {
        return Category::create($categoryDTO->toArray());
    }

    public function all()
    {
        return Category::all();
    }
}
