<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ProgramCategoryInterface;
use App\Models\ProgramCategory;
use Illuminate\Database\Eloquent\Collection;

class ProgramCategoryRepository implements ProgramCategoryInterface
{
    public function getAll(): Collection
    {
        return ProgramCategory::orderBy('name', 'asc')->get();
    }

    public function findById(string $id): ProgramCategory
    {
        return ProgramCategory::findOrFail($id);
    }

    public function findBySlug(string $slug): ?ProgramCategory
    {
        return ProgramCategory::where('slug', $slug)->first();
    }

    public function create(array $data): ProgramCategory
    {
        return ProgramCategory::create($data);
    }

    public function update(string $id, array $data): ProgramCategory
    {
        $category = $this->findById($id);
        $category->update($data);
        return $category;
    }

    public function delete(string $id): bool
    {
        $category = $this->findById($id);
        return $category->delete();
    }
}
