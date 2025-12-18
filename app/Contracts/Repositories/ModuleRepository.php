<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ModuleInterface;
use App\Models\Module;
use Illuminate\Support\Collection;

class ModuleRepository implements ModuleInterface
{
    public function getByCourse(string $courseId): Collection
    {
        return Module::where('course_id', $courseId)
            ->orderBy('step')
            ->get();
    }

    public function getLastStepByCourse(string $courseId): int
    {
        return Module::where('course_id', $courseId)->max('step') ?? 0;
    }

    public function create(array $data): Module
    {
        return Module::create($data);
    }

    public function findById(string $id): Module
    {
        return Module::findOrFail($id);
    }

    public function update(string $id, array $data): Module
    {
        $module = $this->findById($id);
        $module->update($data);

        return $module;
    }

    public function delete(string $id): void
    {
        $this->findById($id)->delete();
    }

    public function findByCourseAndStep(string $courseId, int $step): ?Module
    {
        return Module::where('course_id', $courseId)
            ->where('step', $step)
            ->first();
    }

    public function decrementStepsAfter(string $courseId, int $step): void
    {
        Module::where('course_id', $courseId)
            ->where('step', '>', $step)
            ->decrement('step');
    }
}
