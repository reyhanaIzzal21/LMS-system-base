<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ProgramInterface;
use App\Models\Program;
use Illuminate\Database\Eloquent\Collection;

class ProgramRepository implements ProgramInterface
{
    public function getAll(): Collection
    {
        return Program::with(['category', 'benefits'])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function findById(string $id): Program
    {
        return Program::with(['category', 'benefits'])->findOrFail($id);
    }

    public function findBySlug(string $slug): ?Program
    {
        return Program::with(['category', 'benefits'])
            ->where('slug', $slug)
            ->first();
    }

    public function create(array $data): Program
    {
        return Program::create($data);
    }

    public function update(string $id, array $data): Program
    {
        $program = Program::findOrFail($id);
        $program->update($data);
        return $program;
    }

    public function delete(string $id): bool
    {
        $program = Program::findOrFail($id);
        return $program->delete();
    }

    public function updateActiveStatus(string $id, bool $isActive): void
    {
        Program::where('id', $id)->update([
            'is_active' => $isActive,
        ]);
    }
}
