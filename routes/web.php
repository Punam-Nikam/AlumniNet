<?php

use Illuminate\Support\Facades\Route;
//task 1
use App\Http\Controllers\AlumniController;

Route::get('/alumni', [AlumniController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
