<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Public routes
Route::get('/', fn() => redirect('/alumni'));
Route::get('/alumni', [AlumniController::class, 'index']);

// Auth routes
Route::get('/register',  [RegisterController::class, 'showForm']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login',     [LoginController::class, 'showForm'])->name('login');
Route::post('/login',    [LoginController::class, 'login']);
Route::post('/logout',   [LoginController::class, 'logout'])->name('logout');

// Admin routes (protected)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard',        [AdminController::class, 'dashboard']);
    Route::get('/alumni',           [AdminController::class, 'allAlumni']);
    Route::post('/approve/{id}',    [AdminController::class, 'approve']);
    Route::post('/reject/{id}',     [AdminController::class, 'reject']);
});