<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Services\SubModuleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubModuleController extends Controller
{
    protected SubModuleService $subModuleService;

    public function __construct(SubModuleService $subModuleService)
    {
        $this->subModuleService = $subModuleService;
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

        return redirect()->back()->with('success', 'Materi berhasil ditambahkan.');
    }

    /**
     * Display the specified sub module.
     */
    public function show(string $subModule): View
    {
        $subModule = $this->subModuleService->findById($subModule);

        return view('admin.pages.courses.panes.modules.panes.sub-module-detail', compact('subModule'));
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

        $this->subModuleService->updateSubModule($subModule, [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Materi berhasil diperbarui.');
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
