<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Services\ModuleService;
use App\Services\CourseService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TeacherModuleController extends Controller
{
    protected ModuleService $moduleService;
    protected CourseService $courseService;

    public function __construct(ModuleService $moduleService, CourseService $courseService)
    {
        $this->moduleService = $moduleService;
        $this->courseService = $courseService;
    }

    /**
     * Store a newly created module.
     */
    public function store(Request $request, string $course): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
        ]);

        $this->moduleService->createModule([
            'course_id' => $course,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
        ]);

        return redirect()->back()->with('success', 'Module berhasil ditambahkan.');
    }

    /**
     * Display the specified module.
     */
    public function show(string $module): View
    {
        $module = $this->moduleService->findById($module);

        return view('teacher.pages.courses.panes.modules.detail', compact('module'));
    }

    /**
     * Update the specified module.
     */
    public function update(Request $request, string $module): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
        ]);

        $this->moduleService->updateModule($module, [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
        ]);

        return redirect()->back()->with('success', 'Module berhasil diperbarui.');
    }

    /**
     * Remove the specified module.
     */
    public function destroy(string $module): RedirectResponse
    {
        $this->moduleService->deleteModule($module);

        return redirect()->back()->with('success', 'Module berhasil dihapus.');
    }

    /**
     * Move module step up.
     */
    public function moveUp(string $module): RedirectResponse
    {
        $this->moduleService->moveStepUp($module);

        return redirect()->back()->with('success', 'Urutan module berhasil diubah.');
    }

    /**
     * Move module step down.
     */
    public function moveDown(string $module): RedirectResponse
    {
        $this->moduleService->moveStepDown($module);

        return redirect()->back()->with('success', 'Urutan module berhasil diubah.');
    }
}
