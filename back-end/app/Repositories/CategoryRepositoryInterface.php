<?php

namespace App\Repositories;

use App\DTO\CategoryDTO;

interface CategoryRepositoryInterface
{
    public function create(CategoryDTO $categoryDTO);
    public function all();
}
