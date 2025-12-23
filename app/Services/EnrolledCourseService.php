<?php

namespace App\Services;

use App\Models\User;
use App\Models\Course;
use App\Contracts\Interfaces\EnrolledCourseInterface;
use Exception;

class EnrolledCourseService
{
    protected EnrolledCourseInterface $enrolledCourseRepository;

    public function __construct(EnrolledCourseInterface $enrolledCourseRepository)
    {
        $this->enrolledCourseRepository = $enrolledCourseRepository;
    }

    /**
     * Enroll user in a free course.
     */
    public function enrollFreeCourse(User $user, Course $course): array
    {
        // Check if course is free
        if ($course->is_premium) {
            throw new Exception('Kursus ini berbayar. Silakan lakukan pembayaran.');
        }

        // Check if already enrolled
        $existingEnrollment = $this->enrolledCourseRepository->getEnrollment($user->id, $course->id);
        if ($existingEnrollment) {
            return [
                'success' => true,
                'message' => 'Anda sudah terdaftar di kursus ini.',
                'enrollment' => $existingEnrollment,
            ];
        }

        // Create enrollment
        $enrollment = $this->enrolledCourseRepository->createEnrollment($user->id, $course->id);

        return [
            'success' => true,
            'message' => 'Berhasil mendaftar di kursus!',
            'enrollment' => $enrollment,
        ];
    }

    /**
     * Check if user is enrolled in a course.
     */
    public function isEnrolled(string $userId, string $courseId): bool
    {
        return $this->enrolledCourseRepository->getEnrollment($userId, $courseId) !== null;
    }

    /**
     * Get lesson data for enrolled course.
     */
    public function getLessonData(User $user, string $courseSlug, string $subModuleSlug): array
    {
        // Fetch course
        $course = $this->enrolledCourseRepository->getCourseWithModules($courseSlug);

        if (!$course) {
            throw new Exception('Kursus tidak ditemukan.');
        }

        // Check enrollment
        if (!$this->isEnrolled($user->id, $course->id)) {
            throw new Exception('Anda harus mendaftar terlebih dahulu untuk mengakses kursus ini.');
        }

        // Find current sub-module
        $currentSubModule = null;
        $currentModule = null;

        foreach ($course->modules as $module) {
            foreach ($module->subModules as $subModule) {
                if ($subModule->slug === $subModuleSlug) {
                    $currentSubModule = $subModule;
                    $currentModule = $module;
                    break 2;
                }
            }
        }

        if (!$currentSubModule) {
            throw new Exception('Materi tidak ditemukan.');
        }

        // Build flat list of all sub-modules for navigation
        $allSubModules = $this->getFlatSubModuleList($course);
        $currentIndex = $this->findCurrentIndex($allSubModules, $currentSubModule->id);

        // Get previous and next sub-modules
        $prevSubModule = $currentIndex > 0 ? $allSubModules[$currentIndex - 1] : null;
        $nextSubModule = $currentIndex < count($allSubModules) - 1 ? $allSubModules[$currentIndex + 1] : null;

        // Get user's completed sub-modules for this course
        $completedSubModuleIds = $this->enrolledCourseRepository->getCompletedSubModuleIds(
            $user->id,
            collect($allSubModules)->pluck('id')->toArray()
        );

        // Calculate progress
        $totalSubModules = count($allSubModules);
        $completedCount = count($completedSubModuleIds);
        $progressPercentage = $totalSubModules > 0 ? round(($completedCount / $totalSubModules) * 100) : 0;

        // Check if current sub-module is completed
        $isCurrentCompleted = in_array($currentSubModule->id, $completedSubModuleIds);

        return compact(
            'course',
            'currentModule',
            'currentSubModule',
            'prevSubModule',
            'nextSubModule',
            'completedSubModuleIds',
            'progressPercentage',
            'completedCount',
            'totalSubModules',
            'isCurrentCompleted'
        );
    }

    /**
     * Get first sub-module of a course.
     */
    public function getFirstSubModule(string $courseSlug): ?object
    {
        $course = $this->enrolledCourseRepository->getCourseWithModules($courseSlug);

        if (!$course) {
            return null;
        }

        $firstModule = $course->modules->first();
        if (!$firstModule || $firstModule->subModules->isEmpty()) {
            return null;
        }

        return $firstModule->subModules->first();
    }

    /**
     * Mark sub-module as complete.
     */
    public function markComplete(User $user, string $subModuleId): array
    {
        $subModule = $this->enrolledCourseRepository->getSubModuleById($subModuleId);

        if (!$subModule) {
            throw new Exception('Materi tidak ditemukan.');
        }

        $course = $subModule->module->course;

        if (!$this->isEnrolled($user->id, $course->id)) {
            throw new Exception('Unauthorized');
        }

        // Mark as complete
        $this->enrolledCourseRepository->markSubModuleComplete($user->id, $subModuleId);

        // Calculate new progress
        $totalSubModules = $this->getTotalSubModules($course);
        $completedCount = $this->enrolledCourseRepository->getCompletedCountForCourse($user->id, $course->id);
        $progressPercentage = $totalSubModules > 0 ? round(($completedCount / $totalSubModules) * 100) : 0;

        return [
            'success' => true,
            'message' => 'Materi ditandai selesai!',
            'completed_count' => $completedCount,
            'total' => $totalSubModules,
            'progress' => $progressPercentage,
        ];
    }

    /**
     * Mark sub-module as incomplete.
     */
    public function markIncomplete(User $user, string $subModuleId): array
    {
        $subModule = $this->enrolledCourseRepository->getSubModuleById($subModuleId);

        if (!$subModule) {
            throw new Exception('Materi tidak ditemukan.');
        }

        $course = $subModule->module->course;

        if (!$this->isEnrolled($user->id, $course->id)) {
            throw new Exception('Unauthorized');
        }

        // Mark as incomplete
        $this->enrolledCourseRepository->markSubModuleIncomplete($user->id, $subModuleId);

        // Calculate new progress
        $totalSubModules = $this->getTotalSubModules($course);
        $completedCount = $this->enrolledCourseRepository->getCompletedCountForCourse($user->id, $course->id);
        $progressPercentage = $totalSubModules > 0 ? round(($completedCount / $totalSubModules) * 100) : 0;

        return [
            'success' => true,
            'message' => 'Status selesai dihapus.',
            'completed_count' => $completedCount,
            'total' => $totalSubModules,
            'progress' => $progressPercentage,
        ];
    }

    /**
     * Get a flat list of all sub-modules in the course.
     */
    private function getFlatSubModuleList($course): array
    {
        $subModules = [];

        foreach ($course->modules as $module) {
            foreach ($module->subModules as $subModule) {
                $subModules[] = (object) [
                    'id' => $subModule->id,
                    'slug' => $subModule->slug,
                    'title' => $subModule->title,
                    'module_id' => $module->id,
                    'module_step' => $module->step,
                    'module_title' => $module->title,
                    'step' => $subModule->step,
                ];
            }
        }

        return $subModules;
    }

    /**
     * Find the current index in the flat sub-module list.
     */
    private function findCurrentIndex(array $subModules, $subModuleId): int
    {
        foreach ($subModules as $index => $subModule) {
            if ($subModule->id === $subModuleId) {
                return $index;
            }
        }

        return 0;
    }

    /**
     * Get total sub-modules in a course.
     */
    private function getTotalSubModules($course): int
    {
        return $course->modules->sum(function ($module) {
            return $module->subModules->count();
        });
    }
}
