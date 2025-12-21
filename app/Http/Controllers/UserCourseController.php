<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCourseController extends Controller
{
    public function index(Request $request)
    {
        return view('user.pages.courses.index');
    }

    public function show(Request $request, $id)
    {
        return view('user.pages.courses.detail');
    }
}
