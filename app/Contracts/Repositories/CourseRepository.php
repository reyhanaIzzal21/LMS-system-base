<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CourseInterface;
use App\Models\Course;
use Illuminate\Database\Eloquent\Collection;

class CourseRepository implements CourseInterface
{
    public function getAllCourses(): Collection
    {
        return Course::with(['category', 'user'])->orderBy('created_at', 'desc')->get();
    }

    public function getCoursesByTeacher(string $teacherId): Collection
    {
        return Course::with(['category', 'user'])
            ->where('user_id', $teacherId)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getCourseById(string $courseId): Course
    {
        return Course::findOrFail($courseId);
    }

    public function findCourseBySlug(string $slug): ?Course
    {
        return Course::where('slug', $slug)->first();
    }

    public function createCourse(array $courseData): Course
    {
        return Course::create($courseData);
    }

    public function updateCourse(string $courseId, array $courseData): Course
    {
        $course = $this->getCourseById($courseId);
        $course->update($courseData);
        return $course;
    }

    public function deleteCourse(string $courseId): bool
    {
        $course = $this->getCourseById($courseId);
        return $course->delete();
    }

    public function updateReadyStatus(string $courseId, bool $isReady): void
    {
        Course::where('id', $courseId)->update([
            'is_ready' => $isReady,
        ]);
    }
}
