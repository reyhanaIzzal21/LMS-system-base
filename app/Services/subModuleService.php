<?php

namespace App\Services;

use App\Contracts\Interfaces\SubModuleInterface;
use App\Models\SubModule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubModuleService
{
    protected SubModuleInterface $subModuleRepository;

    public function __construct(SubModuleInterface $subModuleRepository)
    {
        $this->subModuleRepository = $subModuleRepository;
    }

    public function getSubModulesByModule(string $moduleId)
    {
        return $this->subModuleRepository->getByModule($moduleId);
    }

    public function findById(string $id): SubModule
    {
        return $this->subModuleRepository->findById($id);
    }

    public function createSubModule(array $data): SubModule
    {
        // Auto-generate step
        $lastStep = $this->subModuleRepository->getLastStepByModule($data['module_id']);
        $data['step'] = $lastStep + 1;

        // Generate slug
        $data['slug'] = Str::slug($data['title']) . '-' . uniqid();

        return $this->subModuleRepository->create($data);
    }

    public function updateSubModule(string $id, array $data): SubModule
    {
        if (isset($data['title'])) {
            $data['slug'] = Str::slug($data['title']) . '-' . uniqid();
        }

        return $this->subModuleRepository->update($id, $data);
    }

    public function deleteSubModule(string $id): void
    {
        DB::transaction(function () use ($id) {
            $subModule = $this->subModuleRepository->findById($id);
            $moduleId = $subModule->module_id;
            $deletedStep = $subModule->step;

            $this->subModuleRepository->delete($id);

            // Reorder remaining sub modules
            $this->subModuleRepository->decrementStepsAfter($moduleId, $deletedStep);
        });
    }

    public function moveStepUp(string $subModuleId): void
    {
        DB::transaction(function () use ($subModuleId) {
            $currentSubModule = $this->subModuleRepository->findById($subModuleId);

            if ($currentSubModule->step <= 1) {
                return;
            }

            $targetStep = $currentSubModule->step - 1;

            $swapSubModule = $this->subModuleRepository
                ->findByModuleAndStep($currentSubModule->module_id, $targetStep);

            if (! $swapSubModule) {
                return;
            }

            // Swap step
            $swapSubModule->update(['step' => $currentSubModule->step]);
            $currentSubModule->update(['step' => $targetStep]);
        });
    }

    public function moveStepDown(string $subModuleId): void
    {
        DB::transaction(function () use ($subModuleId) {
            $currentSubModule = $this->subModuleRepository->findById($subModuleId);

            $maxStep = $this->subModuleRepository
                ->getLastStepByModule($currentSubModule->module_id);

            if ($currentSubModule->step >= $maxStep) {
                return;
            }

            $targetStep = $currentSubModule->step + 1;

            $swapSubModule = $this->subModuleRepository
                ->findByModuleAndStep($currentSubModule->module_id, $targetStep);

            if (! $swapSubModule) {
                return;
            }

            // Swap step
            $swapSubModule->update(['step' => $currentSubModule->step]);
            $currentSubModule->update(['step' => $targetStep]);
        });
    }
}
