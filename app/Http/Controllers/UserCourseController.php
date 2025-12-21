<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCourseController extends Controller
{
    public function courses(Request $request)
    {
        return view('user.pages.courses.index');
    }
}
