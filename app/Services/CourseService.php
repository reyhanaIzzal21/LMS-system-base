<?php

namespace App\Services;

use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Contracts\Interfaces\CourseInterface;

class CourseService
{
    protected CourseInterface $courseRepository;

    public function __construct(CourseInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function getAllCourses()
    {
        return $this->courseRepository->getAllCourses();
    }

    public function getCoursesByTeacher(string $teacherId)
    {
        return $this->courseRepository->getCoursesByTeacher($teacherId);
    }

    public function getCourseById(string $courseId): Course
    {
        return $this->courseRepository->getCourseById($courseId);
    }

    public function findCourseBySlug(string $slug): ?Course
    {
        return $this->courseRepository->findCourseBySlug($slug);
    }

    protected function generateUniqueSlug(string $title): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $counter = 1;

        while ($this->courseRepository->findCourseBySlug($slug)) {
            $slug = $base . '-' . $counter++;
        }

        return $slug;
    }

    protected function handlePhotoUpload($photoFile, ?string $existingPath = null): ?string
    {
        if (! $photoFile) {
            return $existingPath;
        }

        // delete old
        if ($existingPath && Storage::disk('public')->exists($existingPath)) {
            Storage::disk('public')->delete($existingPath);
        }

        $path = $photoFile->store('courses', 'public');

        return $path;
    }

    protected function ensureUserIsTeacher(string $userId): void
    {
        $user = User::findOrFail($userId);

        if (! $user->hasRole('teacher')) {
            throw new \Exception('Selected author must have teacher role.');
        }
    }

    public function createCourse(array $courseData): Course
    {
        return DB::transaction(function () use ($courseData) {
            $this->ensureUserIsTeacher($courseData['user_id']);
            // business rules
            $courseData['slug'] = $this->generateUniqueSlug($courseData['title']);

            $courseData['is_premium'] = isset($courseData['is_premium']) ? (bool)$courseData['is_premium'] : false;

            if (! $courseData['is_premium']) {
                // free course -> price & promotional_price normalization
                $courseData['price'] = 0;
                $courseData['promotional_price'] = null;
            } else {
                // ensure promotional_price less than or equal to price if provided
                if (isset($courseData['promotional_price']) && $courseData['promotional_price'] > 0) {
                    if ($courseData['promotional_price'] >= $courseData['price']) {
                        // force promotional_price null to avoid invalid promo
                        $courseData['promotional_price'] = null;
                    }
                }
            }

            // photo handling: if file object is present, controller should have replaced file with UploadedFile in $courseData['photo_file']
            if (isset($courseData['photo_file'])) {
                $courseData['photo'] = $this->handlePhotoUpload($courseData['photo_file']);
                unset($courseData['photo_file']);
            }

            // set is_ready default to false if not set
            $courseData['is_ready'] = $courseData['is_ready'] ?? false;

            return $this->courseRepository->createCourse($courseData);
        });
    }

    public function updateCourse(string $courseId, array $courseData): Course
    {
        return DB::transaction(function () use ($courseId, $courseData) {
            $this->ensureUserIsTeacher($courseData['user_id']);
            $course = $this->courseRepository->getCourseById($courseId);

            // if title changed -> regenerate slug (ensure unique)
            if (isset($courseData['title']) && $courseData['title'] !== $course->title) {
                $courseData['slug'] = $this->generateUniqueSlug($courseData['title']);
            }

            $courseData['is_premium'] = isset($courseData['is_premium']) ? (bool)$courseData['is_premium'] : false;

            if (! $courseData['is_premium']) {
                $courseData['price'] = 0;
                $courseData['promotional_price'] = null;
            } else {
                if (isset($courseData['promotional_price']) && $courseData['promotional_price'] > 0) {
                    if ($courseData['promotional_price'] >= ($courseData['price'] ?? $course->price)) {
                        $courseData['promotional_price'] = null;
                    }
                }
            }

            if (isset($courseData['photo_file'])) {
                $courseData['photo'] = $this->handlePhotoUpload($courseData['photo_file'], $course->photo);
                unset($courseData['photo_file']);
            }

            return $this->courseRepository->updateCourse($courseId, $courseData);
        });
    }

    public function deleteCourse(string $courseId): bool
    {
        return DB::transaction(function () use ($courseId) {
            $course = $this->courseRepository->getCourseById($courseId);

            // delete photo file if exists
            if ($course->photo && Storage::disk('public')->exists($course->photo)) {
                Storage::disk('public')->delete($course->photo);
            }

            return $this->courseRepository->deleteCourse($courseId);
        });
    }

    public function setReadyStatus(string $courseId, bool $isReady): void
    {
        $this->courseRepository->updateReadyStatus($courseId, $isReady);
    }
}
