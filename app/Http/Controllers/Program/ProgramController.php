<?php

namespace App\Http\Controllers\Program;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Services\ProgramService;
use App\Services\ProgramCategoryService;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;

class ProgramController extends Controller
{
    protected ProgramService $programService;
    protected ProgramCategoryService $categoryService;

    public function __construct(
        ProgramService $programService,
        ProgramCategoryService $categoryService
    ) {
        $this->programService = $programService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $programs = $this->programService->getAll();
        return view('admin.pages.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = $this->categoryService->getAll();
        return view('admin.pages.programs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // Handle thumbnail file
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail_file'] = $request->file('thumbnail');
        }

        $this->programService->create($validated);

        return redirect()
            ->route('programs.index')
            ->with('success', 'Program berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug): View
    {
        $program = $this->programService->findBySlug($slug);

        if ($program === null) {
            abort(404);
        }

        return view('admin.pages.programs.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $program): View
    {
        $programData = $this->programService->findById($program);
        $categories = $this->categoryService->getAll();

        return view('admin.pages.programs.edit', compact('programData', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramRequest $request, string $program): RedirectResponse
    {
        $validated = $request->validated();

        // Handle thumbnail file
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail_file'] = $request->file('thumbnail');
        }

        $this->programService->update($program, $validated);

        return redirect()
            ->route('programs.index')
            ->with('success', 'Program berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $program): RedirectResponse
    {
        $this->programService->delete($program);

        return redirect()
            ->route('programs.index')
            ->with('success', 'Program berhasil dihapus.');
    }

    /**
     * Toggle active status of a program.
     */
    public function toggleActive(Request $request, string $program): RedirectResponse
    {
        $request->validate([
            'is_active' => 'required|boolean',
        ]);

        $this->programService->setActiveStatus($program, (bool) $request->is_active);

        return redirect()->back()->with('success', 'Status program berhasil diperbarui.');
    }
}
