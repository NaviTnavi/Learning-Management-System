<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstructorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $courses = \App\Models\Course::with('instructor')->latest()->take(6)->get();
    return view('welcome', compact('courses'));
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    
    if ($user->isInstructor()) {
        // Instructor dashboard data
        $courses = $user->courses()->with('students')->latest()->get();
        
        $totalStudents = $courses->sum(function($course) {
            return $course->students->count();
        });
        
        $completedEnrollments = $courses->sum(function($course) {
            return $course->students->where('pivot.is_completed', true)->count();
        });
        
        return view('dashboard', compact('courses', 'totalStudents', 'completedEnrollments'));
    } else {
        // Student dashboard
        $enrolledCourses = $user->enrolledCourses()->with('instructor')->get();
        return view('dashboard', compact('enrolledCourses'));
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Course routes
    Route::resource('courses', CourseController::class);
    
    // Instructor dashboard (alternative route)
    Route::get('/instructor/dashboard', [InstructorController::class, 'dashboard'])
        ->name('instructor.dashboard');
});

require __DIR__.'/auth.php';
