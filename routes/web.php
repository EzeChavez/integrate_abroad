<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // User Preferences Routes
    Route::get('/user/preferences', [App\Modules\UserPreferences\Controllers\UserPreferenceController::class, 'index'])
        ->name('user-preferences.index');
    Route::put('/user/preferences', [App\Modules\UserPreferences\Controllers\UserPreferenceController::class, 'update'])
        ->name('user-preferences.update');
});
