<?php

namespace App\Services;

use App\Contracts\Interfaces\ModuleInterface;
use Illuminate\Support\Str;
use App\Models\Module;
use Illuminate\Support\Facades\DB;

class ModuleService
{
    protected ModuleInterface $moduleRepository;

    public function __construct(ModuleInterface $moduleRepository)
    {
        $this->moduleRepository = $moduleRepository;
    }

    public function getModulesByCourse(string $courseId)
    {
        return $this->moduleRepository->getByCourse($courseId);
    }

    public function createModule(array $data): Module
    {
        // 🔹 Hitung step otomatis
        $lastStep = $this->moduleRepository->getLastStepByCourse($data['course_id']);
        $data['step'] = $lastStep + 1;

        // 🔹 Generate slug
        $data['slug'] = Str::slug($data['title']) . '-' . uniqid();

        return $this->moduleRepository->create($data);
    }

    public function updateModule(string $id, array $data): Module
    {
        if (isset($data['title'])) {
            $data['slug'] = Str::slug($data['title']) . '-' . uniqid();
        }

        return $this->moduleRepository->update($id, $data);
    }

    public function deleteModule(string $id): void
    {
        DB::transaction(function () use ($id) {
            $module = $this->moduleRepository->findById($id);
            $courseId = $module->course_id;
            $deletedStep = $module->step;

            $this->moduleRepository->delete($id);

            // Reorder remaining modules
            $this->moduleRepository->decrementStepsAfter($courseId, $deletedStep);
        });
    }

    public function moveStepUp(string $moduleId): void
    {
        DB::transaction(function () use ($moduleId) {

            $currentModule = $this->moduleRepository->findById($moduleId);

            if ($currentModule->step <= 1) {
                return;
            }

            $targetStep = $currentModule->step - 1;

            $swapModule = $this->moduleRepository
                ->findByCourseAndStep($currentModule->course_id, $targetStep);

            if (! $swapModule) {
                return;
            }

            // swap step
            $swapModule->update(['step' => $currentModule->step]);
            $currentModule->update(['step' => $targetStep]);
        });
    }

    public function moveStepDown(string $moduleId): void
    {
        DB::transaction(function () use ($moduleId) {

            $currentModule = $this->moduleRepository->findById($moduleId);

            $maxStep = $this->moduleRepository
                ->getLastStepByCourse($currentModule->course_id);

            if ($currentModule->step >= $maxStep) {
                return;
            }

            $targetStep = $currentModule->step + 1;

            $swapModule = $this->moduleRepository
                ->findByCourseAndStep($currentModule->course_id, $targetStep);

            if (! $swapModule) {
                return;
            }

            // swap step
            $swapModule->update(['step' => $currentModule->step]);
            $currentModule->update(['step' => $targetStep]);
        });
    }
}
