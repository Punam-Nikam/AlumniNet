<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Public routes
Route::get('/',          fn() => redirect('/alumni'));
Route::get('/alumni',    [AlumniController::class, 'index']);
Route::get('/login',     [LoginController::class, 'showForm'])->name('login');
Route::post('/login',    [LoginController::class, 'login']);
Route::get('/register',  [RegisterController::class, 'showForm']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout',   [LoginController::class, 'logout'])->name('logout');

// Protected routes (must be logged in)
Route::middleware(['auth'])->group(function () {
    // Jobs
    Route::get('/jobs',              [JobPostController::class, 'index']);
    Route::get('/jobs/create',       [JobPostController::class, 'create']);
    Route::post('/jobs',             [JobPostController::class, 'store']);
    Route::get('/jobs/{id}',         [JobPostController::class, 'show']);
    Route::delete('/jobs/{id}',      [JobPostController::class, 'destroy']);

    // Connections
    Route::get('/connections',               [ConnectionController::class, 'index']);
    Route::post('/connect/{id}',             [ConnectionController::class, 'connect']);
    Route::post('/connections/accept/{id}',  [ConnectionController::class, 'accept']);
    Route::post('/connections/reject/{id}',  [ConnectionController::class, 'reject']);
});
