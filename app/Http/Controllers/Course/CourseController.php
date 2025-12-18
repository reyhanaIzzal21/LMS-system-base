<?php

namespace App\Http\Controllers\Course;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Services\CourseService;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class CourseController extends Controller
{
    protected CourseService $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function index(): View
    {
        $courses = $this->courseService->getAllCourses();
        return view('admin.pages.courses.index', compact('courses'));
    }

    public function create(): View
    {
        $categories = Category::orderBy('name')->get();
        $users = User::role('teacher')->orderBy('name')->get();
        return view('admin.pages.courses.create', compact('categories', 'users'));
    }

    public function store(CourseRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // move uploaded file object into array key expected by service
        if ($request->hasFile('photo')) {
            $validated['photo_file'] = $request->file('photo');
        }

        $this->courseService->createCourse($validated);

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(string $course): View
    {
        $courseData = $this->courseService->getCourseById($course);
        $categories = Category::orderBy('name')->get();
        $users = User::role('teacher')->orderBy('name')->get();
        return view('admin.pages.courses.edit', compact('courseData', 'categories', 'users'));
    }

    public function update(CourseRequest $request, string $course): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $validated['photo_file'] = $request->file('photo');
        }

        $this->courseService->updateCourse($course, $validated);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(string $course): RedirectResponse
    {
        $this->courseService->deleteCourse($course);

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }

    public function show(string $slug): View
    {
        $course = $this->courseService->findCourseBySlug($slug);
        abort_unless($course, 404);
        
        // Added these lines
        $modules = $course->modules;
        $courseId = $course->id;
        
        return view('admin.pages.courses.show', compact('course', 'modules', 'courseId'));
    }

    public function setReadyStatus(Request $request, string $course): RedirectResponse
    {
        $request->validate([
            'is_ready' => 'required|boolean',
        ]);

        $this->courseService->setReadyStatus(
            $course,
            (bool) $request->is_ready
        );

        return redirect()->back()->with('success', 'Course status updated successfully.');
    }
}
