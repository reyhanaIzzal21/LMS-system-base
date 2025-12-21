<?php

namespace App\Http\Controllers\Program;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Services\ProgramCategoryService;
use App\Http\Requests\StoreProgramCategoryRequest;
use App\Http\Requests\UpdateProgramCategoryRequest;

class ProgramCategoryController extends Controller
{
    protected ProgramCategoryService $service;

    public function __construct(ProgramCategoryService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = $this->service->getAll();
        return view('admin.pages.program-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.pages.program-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramCategoryRequest $request): RedirectResponse
    {
        $this->service->create($request->validated());

        return redirect()
            ->route('program-categories.index')
            ->with('success', 'Kategori program berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $programCategory): View
    {
        $category = $this->service->findById($programCategory);
        return view('admin.pages.program-categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramCategoryRequest $request, string $programCategory): RedirectResponse
    {
        $this->service->update($programCategory, $request->validated());

        return redirect()
            ->route('program-categories.index')
            ->with('success', 'Kategori program berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $programCategory): RedirectResponse
    {
        $this->service->delete($programCategory);

        return redirect()
            ->route('program-categories.index')
            ->with('success', 'Kategori program berhasil dihapus.');
    }
}
