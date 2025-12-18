<?php

namespace App\Contracts\Interfaces;

use App\Models\Course;
use Illuminate\Database\Eloquent\Collection;

interface CourseInterface
{
    public function getAllCourses(): Collection;

    public function getCourseById(string $courseId): Course;

    public function findCourseBySlug(string $slug): ?Course;

    public function createCourse(array $courseData): Course;

    public function updateCourse(string $courseId, array $courseData): Course;

    public function deleteCourse(string $courseId): bool;
    public function updateReadyStatus(string $courseId, bool $isReady): void;
}
