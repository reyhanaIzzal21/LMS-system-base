<?php

namespace App\Contracts\Repositories;

use App\Models\Course;
use App\Models\SubModule;
use App\Models\Enrollment;
use App\Models\UserSubModuleProgress;
use App\Contracts\Interfaces\EnrolledCourseInterface;

class EnrolledCourseRepository implements EnrolledCourseInterface
{
    /**
     * Get course with modules and sub-modules by slug.
     */
    public function getCourseWithModules(string $slug): ?Course
    {
        return Course::where('slug', $slug)
            ->with(['modules' => function ($query) {
                $query->orderBy('step', 'asc');
            }, 'modules.subModules' => function ($query) {
                $query->orderBy('step', 'asc');
            }, 'user', 'category'])
            ->first();
    }

    /**
     * Get enrollment for user and course.
     */
    public function getEnrollment(string $userId, string $courseId): ?Enrollment
    {
        return Enrollment::where('user_id', $userId)
            ->where('course_id', $courseId)
            ->first();
    }

    /**
     * Create enrollment for user and course.
     */
    public function createEnrollment(string $userId, string $courseId): Enrollment
    {
        return Enrollment::create([
            'user_id' => $userId,
            'course_id' => $courseId,
            'enrolled_at' => now(),
        ]);
    }

    /**
     * Get sub-module by ID.
     */
    public function getSubModuleById(string $subModuleId): ?SubModule
    {
        return SubModule::with('module.course')->find($subModuleId);
    }

    /**
     * Get completed sub-module IDs for user in a course.
     */
    public function getCompletedSubModuleIds(string $userId, array $subModuleIds): array
    {
        return UserSubModuleProgress::where('user_id', $userId)
            ->whereIn('sub_module_id', $subModuleIds)
            ->pluck('sub_module_id')
            ->toArray();
    }

    /**
     * Mark sub-module as complete for user.
     */
    public function markSubModuleComplete(string $userId, string $subModuleId): void
    {
        UserSubModuleProgress::firstOrCreate([
            'user_id' => $userId,
            'sub_module_id' => $subModuleId,
        ], [
            'completed_at' => now(),
        ]);
    }

    /**
     * Mark sub-module as incomplete for user.
     */
    public function markSubModuleIncomplete(string $userId, string $subModuleId): void
    {
        UserSubModuleProgress::where([
            'user_id' => $userId,
            'sub_module_id' => $subModuleId,
        ])->delete();
    }

    /**
     * Get completed count for user in a course.
     */
    public function getCompletedCountForCourse(string $userId, string $courseId): int
    {
        return UserSubModuleProgress::where('user_id', $userId)
            ->whereHas('subModule.module', function ($query) use ($courseId) {
                $query->where('course_id', $courseId);
            })
            ->count();
    }
}
