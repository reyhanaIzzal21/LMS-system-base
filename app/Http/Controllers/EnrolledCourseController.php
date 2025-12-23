<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Services\EnrolledCourseService;
use Illuminate\Support\Facades\Auth;
use Exception;

class EnrolledCourseController extends Controller
{
    protected EnrolledCourseService $enrolledCourseService;

    public function __construct(EnrolledCourseService $enrolledCourseService)
    {
        $this->enrolledCourseService = $enrolledCourseService;
    }

    /**
     * Enroll in a free course.
     */
    public function enrollFree(Request $request, $slug)
    {
        $user = Auth::user();
        $course = Course::where('slug', $slug)->where('is_ready', true)->firstOrFail();

        try {
            $result = $this->enrolledCourseService->enrollFreeCourse($user, $course);

            // Redirect to learning page
            $firstSubModule = $this->enrolledCourseService->getFirstSubModule($slug);

            if ($firstSubModule) {
                return redirect()->route('learn.show', [
                    'courseSlug' => $course->slug,
                    'subModuleSlug' => $firstSubModule->slug
                ])->with('success', $result['message']);
            }

            return redirect()->route('courses.detail', $course->slug)
                ->with('error', 'Kursus ini belum memiliki materi.');
        } catch (Exception $e) {
            return redirect()->route('courses.detail', $course->slug)
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Redirect to the first lesson of the course.
     */
    public function index(Request $request, $courseSlug)
    {
        $user = Auth::user();

        // Check if enrolled
        $course = Course::where('slug', $courseSlug)->firstOrFail();
        if (!$this->enrolledCourseService->isEnrolled($user->id, $course->id)) {
            return redirect()->route('courses.detail', $course->slug)
                ->with('error', 'Anda harus mendaftar terlebih dahulu untuk mengakses kursus ini.');
        }

        // Get the first sub-module
        $firstSubModule = $this->enrolledCourseService->getFirstSubModule($courseSlug);

        if (!$firstSubModule) {
            return redirect()->route('courses.detail', $course->slug)
                ->with('error', 'Kursus ini belum memiliki materi.');
        }

        return redirect()->route('learn.show', [
            'courseSlug' => $courseSlug,
            'subModuleSlug' => $firstSubModule->slug
        ]);
    }

    /**
     * Display the lesson content.
     */
    public function show(Request $request, $courseSlug, $subModuleSlug)
    {
        $user = Auth::user();

        try {
            $data = $this->enrolledCourseService->getLessonData($user, $courseSlug, $subModuleSlug);

            return view('user.pages.courses.widgets.enrolled_course_detail', $data);
        } catch (Exception $e) {
            $course = Course::where('slug', $courseSlug)->first();
            $redirectRoute = $course ? route('courses.detail', $course->slug) : route('courses');

            return redirect($redirectRoute)->with('error', $e->getMessage());
        }
    }

    /**
     * Mark a sub-module as complete.
     */
    public function markComplete(Request $request, $subModuleId)
    {
        $user = Auth::user();

        try {
            $result = $this->enrolledCourseService->markComplete($user, $subModuleId);
            return response()->json($result);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 403);
        }
    }

    /**
     * Unmark a sub-module as complete.
     */
    public function markIncomplete(Request $request, $subModuleId)
    {
        $user = Auth::user();

        try {
            $result = $this->enrolledCourseService->markIncomplete($user, $subModuleId);
            return response()->json($result);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 403);
        }
    }
}
