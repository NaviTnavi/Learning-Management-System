<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    public function dashboard()
    {
        if (!Auth::user()->isInstructor()) {
            abort(403, 'Access denied.');
        }

        $courses = Auth::user()->courses;
        return view('instructor.dashboard', compact('courses'));
    }
}