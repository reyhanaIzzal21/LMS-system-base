<?php

namespace App\Services;

use App\Models\ProgramCategory;
use Illuminate\Support\Str;
use App\Contracts\Interfaces\ProgramCategoryInterface;

class ProgramCategoryService
{
    protected ProgramCategoryInterface $repository;

    public function __construct(ProgramCategoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function findById(string $id): ProgramCategory
    {
        return $this->repository->findById($id);
    }

    public function findBySlug(string $slug): ?ProgramCategory
    {
        return $this->repository->findBySlug($slug);
    }

    protected function generateUniqueSlug(string $name): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $counter = 1;

        while ($this->repository->findBySlug($slug)) {
            $slug = $base . '-' . $counter++;
        }

        return $slug;
    }

    public function create(array $data): ProgramCategory
    {
        $data['slug'] = $this->generateUniqueSlug($data['name']);
        return $this->repository->create($data);
    }

    public function update(string $id, array $data): ProgramCategory
    {
        $category = $this->repository->findById($id);

        // Regenerate slug if name changed
        if (isset($data['name']) && $data['name'] !== $category->name) {
            $data['slug'] = $this->generateUniqueSlug($data['name']);
        }

        return $this->repository->update($id, $data);
    }

    public function delete(string $id): bool
    {
        return $this->repository->delete($id);
    }
}
