<?php

namespace App\Contracts\Interfaces;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryInterface
{
    public function getAllCategories(): Collection;

    public function getCategoryById(int $categoryId): Category;

    public function createCategory(array $categoryData): Category;

    public function updateCategory(int $categoryId, array $categoryData): Category;

    public function deleteCategory(int $categoryId): bool;
}
