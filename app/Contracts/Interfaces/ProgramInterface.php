<?php

namespace App\Contracts\Interfaces;

use App\Models\Program;
use Illuminate\Database\Eloquent\Collection;

interface ProgramInterface
{
    public function getAll(): Collection;

    public function findById(string $id): Program;

    public function findBySlug(string $slug): ?Program;

    public function create(array $data): Program;

    public function update(string $id, array $data): Program;

    public function delete(string $id): bool;

    public function updateActiveStatus(string $id, bool $isActive): void;
}
