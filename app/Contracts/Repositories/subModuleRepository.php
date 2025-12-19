<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SubModuleInterface;
use App\Models\SubModule;
use Illuminate\Support\Collection;

class SubModuleRepository implements SubModuleInterface
{
    public function getByModule(string $moduleId): Collection
    {
        return SubModule::where('module_id', $moduleId)
            ->orderBy('step')
            ->get();
    }

    public function getLastStepByModule(string $moduleId): int
    {
        return SubModule::where('module_id', $moduleId)->max('step') ?? 0;
    }

    public function create(array $data): SubModule
    {
        return SubModule::create($data);
    }

    public function findById(string $id): SubModule
    {
        return SubModule::findOrFail($id);
    }

    public function update(string $id, array $data): SubModule
    {
        $subModule = $this->findById($id);
        $subModule->update($data);

        return $subModule;
    }

    public function delete(string $id): void
    {
        $this->findById($id)->delete();
    }

    public function findByModuleAndStep(string $moduleId, int $step): ?SubModule
    {
        return SubModule::where('module_id', $moduleId)
            ->where('step', $step)
            ->first();
    }

    public function decrementStepsAfter(string $moduleId, int $step): void
    {
        SubModule::where('module_id', $moduleId)
            ->where('step', '>', $step)
            ->decrement('step');
    }
}
