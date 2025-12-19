<?php

namespace App\Http\Controllers\Course;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Services\ModuleService;


class ModuleController extends Controller
{
    protected ModuleService $moduleService;

    public function __construct(ModuleService $moduleService)
    {
        $this->moduleService = $moduleService;
    }

    public function index(string $courseId): View
    {
        $modules = $this->moduleService->getModulesByCourse($courseId);

        return view('admin.pages.courses.show', compact('modules', 'courseId'));
    }

    public function store(Request $request, string $courseId): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string',
        ]);

        $validated['course_id'] = $courseId;

        $this->moduleService->createModule($validated);

        return redirect()->back()->with('success', 'Module created successfully.');
    }

    public function update(Request $request, string $module): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string',
        ]);

        $this->moduleService->updateModule($module, $validated);

        return redirect()->back()->with('success', 'Module updated successfully.');
    }

    public function destroy(string $module): RedirectResponse
    {
        $this->moduleService->deleteModule($module);

        return redirect()->back()->with('success', 'Module deleted successfully.');
    }

    // show module
    public function show(string $module): View
    {
        $module = $this->moduleService->findById($module);

        return view('admin.pages.courses.panes.modules.detail', compact('module'));
    }

    public function moveUp(string $module): RedirectResponse
    {
        $this->moduleService->moveStepUp($module);

        return redirect()->back()->with('success', 'Module step successfully moved up.');
    }

    public function moveDown(string $module): RedirectResponse
    {
        $this->moduleService->moveStepDown($module);

        return redirect()->back()->with('success', 'Module step successfully moved down.');
    }
}
