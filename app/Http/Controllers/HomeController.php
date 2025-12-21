<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function courses(Request $request)
    {
        return view('user.pages.courses.index');
    }

    public function program(Request $request)
    {
        return view('user.pages.program.index');
    }

    public function event(Request $request)
    {
        return view('user.pages.event.index');
    }

    public function blog(Request $request)
    {
        return view('user.pages.blog.index');
    }

    public function testimoni(Request $request)
    {
        return view('user.pages.testimoni.index');
    }
}
