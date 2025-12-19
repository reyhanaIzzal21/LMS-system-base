<?php

namespace App\Contracts\Interfaces;

use App\Models\SubModule;
use Illuminate\Support\Collection;

interface SubModuleInterface
{
    public function getByModule(string $moduleId): Collection;

    public function getLastStepByModule(string $moduleId): int;

    public function create(array $data): SubModule;

    public function findById(string $id): SubModule;

    public function update(string $id, array $data): SubModule;

    public function delete(string $id): void;

    public function findByModuleAndStep(string $moduleId, int $step): ?SubModule;

    public function decrementStepsAfter(string $moduleId, int $step): void;
}
