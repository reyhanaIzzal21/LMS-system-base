<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CategoryInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryInterface
{
    public function getAllCategories(): Collection
    {
        return Category::orderBy('created_at', 'desc')->get();
    }

    public function getCategoryById(int $categoryId): Category
    {
        return Category::findOrFail($categoryId);
    }

    public function createCategory(array $categoryData): Category
    {
        return Category::create([
            'name' => $categoryData['name'],
        ]);
    }

    public function updateCategory(int $categoryId, array $categoryData): Category
    {
        $category = $this->getCategoryById($categoryId);

        $category->update([
            'name' => $categoryData['name'],
        ]);

        return $category;
    }

    public function deleteCategory(int $categoryId): bool
    {
        $category = $this->getCategoryById($categoryId);

        return $category->delete();
    }
}
