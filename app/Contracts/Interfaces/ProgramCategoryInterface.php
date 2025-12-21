<?php

namespace App\Contracts\Interfaces;

use App\Models\ProgramCategory;
use Illuminate\Database\Eloquent\Collection;

interface ProgramCategoryInterface
{
    public function getAll(): Collection;

    public function findById(string $id): ProgramCategory;

    public function findBySlug(string $slug): ?ProgramCategory;

    public function create(array $data): ProgramCategory;

    public function update(string $id, array $data): ProgramCategory;

    public function delete(string $id): bool;
}
