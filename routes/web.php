<?php

use Livewire\Volt\Volt;
use Laravel\Fortify\Features;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Course\CourseController;
use App\Http\Controllers\Course\ModuleController;
use App\Http\Controllers\Course\CategoryController;
use App\Http\Controllers\Course\SubModuleController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Route Prefix admin
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::view('dashboard', 'admin.pages.dashboard')->name('admin.dashboard');

        // Courses Management
        Route::resource('categories', CategoryController::class);
        Route::resource('courses', CourseController::class);
        Route::get('courses/{slug}/show', [CourseController::class, 'show'])->name('courses.show');
        Route::patch('/courses/{course}/ready', [CourseController::class, 'setReadyStatus'])->name('courses.set-ready');

        // Module course
        Route::prefix('courses/{course}')->group(function () {
            Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
            Route::post('/modules', [ModuleController::class, 'store'])->name('modules.store');
        });
        Route::get('/modules/{module}/show', [ModuleController::class, 'show'])->name('modules.show');
        Route::put('/modules/{module}', [ModuleController::class, 'update'])->name('modules.update');
        Route::delete('/modules/{module}', [ModuleController::class, 'destroy'])->name('modules.destroy');
        Route::patch('/modules/{module}/move-up', [ModuleController::class, 'moveUp'])->name('modules.move-up');
        Route::patch('/modules/{module}/move-down', [ModuleController::class, 'moveDown'])->name('modules.move-down');

        // SubModule
        Route::prefix('modules/{module}')->group(function () {
            Route::get('/sub-modules/create', [SubModuleController::class, 'create'])->name('sub-modules.create');
            Route::post('/sub-modules', [SubModuleController::class, 'store'])->name('sub-modules.store');
        });
        Route::get('/sub-modules/{subModule}/show', [SubModuleController::class, 'show'])->name('sub-modules.show');
        Route::get('/sub-modules/{subModule}/edit', [SubModuleController::class, 'edit'])->name('sub-modules.edit');
        Route::put('/sub-modules/{subModule}', [SubModuleController::class, 'update'])->name('sub-modules.update');
        Route::delete('/sub-modules/{subModule}', [SubModuleController::class, 'destroy'])->name('sub-modules.destroy');
        Route::patch('/sub-modules/{subModule}/move-up', [SubModuleController::class, 'moveUp'])->name('sub-modules.move-up');
        Route::patch('/sub-modules/{subModule}/move-down', [SubModuleController::class, 'moveDown'])->name('sub-modules.move-down');
    });

    // Route Prefix teacher
    Route::prefix('teacher')->middleware('role:teacher')->group(function () {
        Route::view('dashboard', 'teacher.pages.dashboard')->name('teacher.dashboard');
    });

    // Route Prefix student
    Route::prefix('student')->middleware('role:student')->group(function () {
        Route::view('dashboard', 'student.pages.dashboard')->name('student.dashboard');
    });

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
