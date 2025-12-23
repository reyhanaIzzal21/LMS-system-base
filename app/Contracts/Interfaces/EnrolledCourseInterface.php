<?php

namespace App\Contracts\Interfaces;

use App\Models\Course;
use App\Models\SubModule;
use App\Models\Enrollment;

interface EnrolledCourseInterface
{
    /**
     * Get course with modules and sub-modules by slug.
     */
    public function getCourseWithModules(string $slug): ?Course;

    /**
     * Get enrollment for user and course.
     */
    public function getEnrollment(string $userId, string $courseId): ?Enrollment;

    /**
     * Create enrollment for user and course.
     */
    public function createEnrollment(string $userId, string $courseId): Enrollment;

    /**
     * Get sub-module by ID.
     */
    public function getSubModuleById(string $subModuleId): ?SubModule;

    /**
     * Get completed sub-module IDs for user in a course.
     */
    public function getCompletedSubModuleIds(string $userId, array $subModuleIds): array;

    /**
     * Mark sub-module as complete for user.
     */
    public function markSubModuleComplete(string $userId, string $subModuleId): void;

    /**
     * Mark sub-module as incomplete for user.
     */
    public function markSubModuleIncomplete(string $userId, string $subModuleId): void;

    /**
     * Get completed count for user in a course.
     */
    public function getCompletedCountForCourse(string $userId, string $courseId): int;
}
