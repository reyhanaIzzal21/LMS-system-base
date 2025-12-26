<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Services\ProgramService;
use App\Services\ProgramCategoryService;

class TeacherProgramController extends Controller
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
        return view('teacher.pages.programs.index', compact('programs'));
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

        return view('teacher.pages.programs.show', compact('program'));
    }
}
