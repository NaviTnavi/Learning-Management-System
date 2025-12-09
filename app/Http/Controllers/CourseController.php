<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    // Show all courses (for students)
    public function index()
    {
        $courses = Course::with('instructor')->latest()->get();
        return view('courses.index', compact('courses'));
    }

    // Show single course
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    // Show create form (instructor only)
    public function create()
    {
        if (!Auth::user()->isInstructor()) {
            abort(403, 'Only instructors can create courses.');
        }
        return view('courses.create');
    }

    // Store new course
    public function store(Request $request)
    {
        if (!Auth::user()->isInstructor()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'content' => 'required|string',
        ]);

        $validated['instructor_id'] = Auth::id();
        Course::create($validated);

        return redirect()->route('instructor.dashboard')->with('success', 'Course created successfully!');
    }

    // Show edit form
    public function edit(Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('courses.edit', compact('course'));
    }

    // Update course
    public function update(Request $request, Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'content' => 'required|string',
        ]);

        $course->update($validated);

        return redirect()->route('instructor.dashboard')->with('success', 'Course updated successfully!');
    }

    // Delete course
    public function destroy(Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }

        $course->delete();

        return redirect()->route('instructor.dashboard')->with('success', 'Course deleted successfully!');
    }
}
