<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Services\CourseService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TeacherCourseController extends Controller
{
    protected CourseService $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    /**
     * Display courses assigned to the teacher.
     */
    public function index(): View
    {
        $courses = $this->courseService->getCoursesByTeacher(Auth::id());
        return view('teacher.pages.courses.index', compact('courses'));
    }

    /**
     * Display the specified course.
     */
    public function show(string $slug): View
    {
        $course = $this->courseService->findCourseBySlug($slug);

        if (!$course) {
            abort(404);
        }

        // Verify the course belongs to this teacher
        if ($course->user_id !== Auth::id()) {
            abort(403);
        }

        $modules = $course->modules;
        $courseId = $course->id;

        return view('teacher.pages.courses.show', compact('course', 'modules', 'courseId'));
    }
}
