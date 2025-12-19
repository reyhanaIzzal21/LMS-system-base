<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Services\SubModuleService;
use App\Services\ModuleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeacherSubModuleController extends Controller
{
    protected SubModuleService $subModuleService;
    protected ModuleService $moduleService;

    public function __construct(SubModuleService $subModuleService, ModuleService $moduleService)
    {
        $this->subModuleService = $subModuleService;
        $this->moduleService = $moduleService;
    }

    /**
     * Show the form for creating a new sub module.
     */
    public function create(string $module): View
    {
        $module = $this->moduleService->findById($module);

        return view('teacher.pages.sub-module.create', compact('module'));
    }

    /**
     * Store a newly created sub module.
     */
    public function store(Request $request, string $module): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $this->subModuleService->createSubModule([
            'module_id' => $module,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'content' => $request->content,
        ]);

        return redirect()->route('teacher.modules.show', $module)->with('success', 'Materi berhasil ditambahkan.');
    }

    /**
     * Display the specified sub module.
     */
    public function show(string $subModule): View
    {
        $subModule = $this->subModuleService->findById($subModule);

        return view('teacher.pages.sub-module.sub-module-detail', compact('subModule'));
    }

    /**
     * Show the form for editing the specified sub module.
     */
    public function edit(string $subModule): View
    {
        $subModule = $this->subModuleService->findById($subModule);

        return view('teacher.pages.sub-module.edit', compact('subModule'));
    }

    /**
     * Update the specified sub module.
     */
    public function update(Request $request, string $subModule): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $subModuleModel = $this->subModuleService->findById($subModule);
        $moduleId = $subModuleModel->module_id;

        $this->subModuleService->updateSubModule($subModule, [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'content' => $request->content,
        ]);

        return redirect()->route('teacher.modules.show', $moduleId)->with('success', 'Materi berhasil diperbarui.');
    }

    /**
     * Remove the specified sub module.
     */
    public function destroy(string $subModule): RedirectResponse
    {
        $this->subModuleService->deleteSubModule($subModule);

        return redirect()->back()->with('success', 'Materi berhasil dihapus.');
    }

    /**
     * Move sub module step up.
     */
    public function moveUp(string $subModule): RedirectResponse
    {
        $this->subModuleService->moveStepUp($subModule);

        return redirect()->back()->with('success', 'Urutan materi berhasil diubah.');
    }

    /**
     * Move sub module step down.
     */
    public function moveDown(string $subModule): RedirectResponse
    {
        $this->subModuleService->moveStepDown($subModule);

        return redirect()->back()->with('success', 'Urutan materi berhasil diubah.');
    }
}
