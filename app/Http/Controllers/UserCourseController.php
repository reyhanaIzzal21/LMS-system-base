<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::where('is_ready', true)
            ->with(['category', 'user', 'benefits'])
            ->latest()
            ->paginate(12);

        $totalCourses = Course::where('is_ready', true)->count();

        return view('user.pages.courses.index', compact('courses', 'totalCourses'));
    }

    public function show(Request $request, $slug)
    {
        $course = Course::where('slug', $slug)
            ->where('is_ready', true)
            ->with(['category', 'user', 'benefits', 'modules.subModules'])
            ->firstOrFail();

        // Check if user is enrolled
        $isEnrolled = Auth::check() && Auth::user()->isEnrolledIn($course->id);

        return view('user.pages.courses.detail', compact('course', 'isEnrolled'));
    }
}
