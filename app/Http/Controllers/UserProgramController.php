<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class UserProgramController extends Controller
{
    public function index(Request $request)
    {
        $programs = Program::where('is_active', true)
            ->with(['category', 'benefits'])
            ->latest()
            ->get();

        return view('user.pages.program.index', compact('programs'));
    }
}
