<?php

namespace App\Contracts\Interfaces;

use Illuminate\Support\Collection;
use App\Models\Module;

interface ModuleInterface
{
    public function getByCourse(string $courseId): Collection;

    public function create(array $data): Module;

    public function findById(string $id): Module;

    public function update(string $id, array $data): Module;

    public function delete(string $id): void;

    public function getLastStepByCourse(string $courseId): int;

    public function findByCourseAndStep(string $courseId, int $step): ?Module;

    public function decrementStepsAfter(string $courseId, int $step): void;
}
