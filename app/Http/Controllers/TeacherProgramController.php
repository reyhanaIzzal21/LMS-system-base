<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;

class TeacherProgramController extends Controller
{
    /**
     * Display a listing of programs assigned to the current teacher.
     */
    public function index(): View
    {
        // Get programs assigned to the current teacher
        $programs = Auth::user()->programs()
            ->with(['category', 'benefits'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('teacher.pages.programs.index', compact('programs'));
    }

    /**
     * Display the specified program.
     */
    public function show(string $slug): View
    {
        $user = Auth::user();

        // Find program by slug and ensure the teacher is assigned to it
        $program = Program::where('slug', $slug)
            ->whereHas('teachers', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->with(['teachers', 'benefits', 'category'])
            ->first();

        if ($program === null) {
            abort(404, 'Program tidak ditemukan atau Anda tidak memiliki akses.');
        }

        return view('teacher.pages.programs.show', compact('program'));
    }
}
