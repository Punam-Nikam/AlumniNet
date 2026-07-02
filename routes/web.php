<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniController;

Route::get('/alumni', [AlumniController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
