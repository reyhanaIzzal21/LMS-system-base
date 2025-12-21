<?php

namespace App\Services;

use App\Models\Program;
use App\Models\ProgramBenefit;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Contracts\Interfaces\ProgramInterface;

class ProgramService
{
    protected ProgramInterface $repository;

    public function __construct(ProgramInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function findById(string $id): Program
    {
        return $this->repository->findById($id);
    }

    public function findBySlug(string $slug): ?Program
    {
        return $this->repository->findBySlug($slug);
    }

    protected function generateUniqueSlug(string $title): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $counter = 1;

        while ($this->repository->findBySlug($slug)) {
            $slug = $base . '-' . $counter++;
        }

        return $slug;
    }

    protected function handleThumbnailUpload($thumbnailFile, ?string $existingPath = null): ?string
    {
        if (! $thumbnailFile) {
            return $existingPath;
        }

        // Delete old thumbnail
        if ($existingPath && Storage::disk('public')->exists($existingPath)) {
            Storage::disk('public')->delete($existingPath);
        }

        return $thumbnailFile->store('programs', 'public');
    }

    protected function syncBenefits(Program $program, array $benefits): void
    {
        // Delete existing benefits
        $program->benefits()->delete();

        // Create new benefits
        foreach ($benefits as $benefitName) {
            if (!empty(trim($benefitName))) {
                ProgramBenefit::create([
                    'program_id' => $program->id,
                    'name' => trim($benefitName),
                ]);
            }
        }
    }

    public function create(array $data): Program
    {
        return DB::transaction(function () use ($data) {
            // Generate unique slug
            $data['slug'] = $this->generateUniqueSlug($data['title']);

            // Handle premium/price logic
            $data['is_premium'] = isset($data['is_premium']) ? (bool)$data['is_premium'] : false;

            if (! $data['is_premium']) {
                $data['price'] = 0;
                $data['promotional_price'] = null;
            } else {
                // Ensure promotional_price is less than price
                if (isset($data['promotional_price']) && $data['promotional_price'] > 0) {
                    if ($data['promotional_price'] >= $data['price']) {
                        $data['promotional_price'] = null;
                    }
                }
            }

            // Handle thumbnail upload
            if (isset($data['thumbnail_file'])) {
                $data['thumbnail'] = $this->handleThumbnailUpload($data['thumbnail_file']);
                unset($data['thumbnail_file']);
            }

            // Set default is_active
            $data['is_active'] = $data['is_active'] ?? true;

            // Extract benefits before creating program
            $benefits = $data['benefits'] ?? [];
            unset($data['benefits']);

            // Create program
            $program = $this->repository->create($data);

            // Sync benefits
            if (!empty($benefits)) {
                $this->syncBenefits($program, $benefits);
            }

            return $program->load('benefits');
        });
    }

    public function update(string $id, array $data): Program
    {
        return DB::transaction(function () use ($id, $data) {
            $program = $this->repository->findById($id);

            // Regenerate slug if title changed
            if (isset($data['title']) && $data['title'] !== $program->title) {
                $data['slug'] = $this->generateUniqueSlug($data['title']);
            }

            // Handle premium/price logic
            $data['is_premium'] = isset($data['is_premium']) ? (bool)$data['is_premium'] : false;

            if (! $data['is_premium']) {
                $data['price'] = 0;
                $data['promotional_price'] = null;
            } else {
                if (isset($data['promotional_price']) && $data['promotional_price'] > 0) {
                    if ($data['promotional_price'] >= ($data['price'] ?? $program->price)) {
                        $data['promotional_price'] = null;
                    }
                }
            }

            // Handle thumbnail upload
            if (isset($data['thumbnail_file'])) {
                $data['thumbnail'] = $this->handleThumbnailUpload($data['thumbnail_file'], $program->thumbnail);
                unset($data['thumbnail_file']);
            }

            // Extract benefits before updating program
            $benefits = $data['benefits'] ?? [];
            unset($data['benefits']);

            // Update program
            $updatedProgram = $this->repository->update($id, $data);

            // Sync benefits
            $this->syncBenefits($updatedProgram, $benefits);

            return $updatedProgram->load('benefits');
        });
    }

    public function delete(string $id): bool
    {
        return DB::transaction(function () use ($id) {
            $program = $this->repository->findById($id);

            // Delete thumbnail if exists
            if ($program->thumbnail && Storage::disk('public')->exists($program->thumbnail)) {
                Storage::disk('public')->delete($program->thumbnail);
            }

            // Benefits will be deleted via cascade
            return $this->repository->delete($id);
        });
    }

    public function setActiveStatus(string $id, bool $isActive): void
    {
        $this->repository->updateActiveStatus($id, $isActive);
    }
}
